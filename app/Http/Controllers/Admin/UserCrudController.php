<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UserRequest as StoreRequest;
use App\Http\Requests\UserRequest as UpdateRequest;

class UserCrudController extends CrudController {

	public function __construct() {
        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\User");
        $this->crud->setRoute("admin/user");
        $this->crud->setEntityNameStrings('user', 'users');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

		$this->crud->setFromDb();

        $this->crud->addField('name', 'update/create/both');
        $this->crud->addField('email', 'update/create/both');
        $this->crud->addField([   // Password
                                  'name' => 'password',
                                  'label' => 'Password',
                                  'type' => 'password'
        ], 'update/create/both');

        $this->crud->addField([  // Select
                                 'label' => "Company",
                                 'type' => 'select2',
                                 'name' => 'company_id', // the db column for the foreign key
                                 'entity' => 'company', // the method that defines the relationship in your Model
                                 'attribute' => 'name', // foreign key attribute that is shown to user
                                 'model' => "App\Models\Company" // foreign key model
        ], 'update/create/both');

        $this->crud->setColumnDetails('Company', [
            // 1-n relationship
            'label' => "Company", // Table column heading
            'type' => "select",
            'name' => 'id', // the column that contains the ID of that connected entity;
            'entity' => 'company', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\Models\Company", // foreign key model
        ]);

        $this->crud->addField( [       // Select2Multiple = n-n relationship (with pivot table)
                                       'label' => "Roles",
                                       'type' => 'select2_multiple',
                                       'name' => 'roles', // the method that defines the relationship in your Model
                                       'entity' => 'roles', // the method that defines the relationship in your Model
                                       'attribute' => 'name', // foreign key attribute that is shown to user
                                       'model' => "App\Models\Role", // foreign key model
                                       'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ], 'update/create/both'
        );
        $this->crud->setColumnDetails('Role', [
            // n-n relationship (with pivot table)
            'label' => "Roles", // Table column heading
            'type' => "select_multiple",
            'name' => 'roles', // the method that defines the relationship in your Model
            'entity' => 'roles', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\Models\Role", // foreign key model
        ]);

		// ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']);
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though: 
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable(); 

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

	public function store(StoreRequest $request)
	{

        $this->crud->hasAccessOrFail('create');

        // fallback to global request instance
        if (is_null($request)) {
            $request = \Request::instance();
        }

        // replace empty values with NULL, so that it will work with MySQL strict mode on
        foreach ($request->input() as $key => $value) {
            if (empty($value) && $value !== '0') {
                $request->request->set($key, null);
            }
        }
        $request->request->set('password', bcrypt($request->input('password')));

        // insert item in the db
        $item = $this->crud->create($request->except(['redirect_after_save', '_token']));

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // redirect the user where he chose to be redirected
        switch ($request->input('redirect_after_save')) {
            case 'current_item_edit':
                return \Redirect::to($this->crud->route.'/'.$item->getKey().'/edit');

            default:
                return \Redirect::to($request->input('redirect_after_save'));
        }
//		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{

        $this->crud->hasAccessOrFail('update');

        // fallback to global request instance
        if (is_null($request)) {
            $request = \Request::instance();
        }

        // replace empty values with NULL, so that it will work with MySQL strict mode on
        foreach ($request->input() as $key => $value) {
            if (empty($value) && $value !== '0') {
                $request->request->set($key, null);
            }
        }

        $request->request->set('password', bcrypt($request->input('password')));

        // update the row in the db
        $this->crud->update($request->get($this->crud->model->getKeyName()),
            $request->except('redirect_after_save', '_token'));

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        return \Redirect::to($this->crud->route);
//		return parent::updateCrud();
	}
}
