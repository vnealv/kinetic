<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\EntryRequest as StoreRequest;
use App\Http\Requests\EntryRequest as UpdateRequest;

class EntryCrudController extends CrudController {

	public function __construct() {
        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Entry");
        $this->crud->setRoute("admin/entry");
        $this->crud->setEntityNameStrings('entry', 'entries');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

		$this->crud->setFromDb();
        // 'remarks'

        //'company_id' field start
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
        //'company_id' field end

        //'business_type_id' field start
        $this->crud->addField([  // Select
                                 'label' => "Business Type",
                                 'type' => 'select2',
                                 'name' => 'business_type_id', // the db column for the foreign key
                                 'entity' => 'businessType', // the method that defines the relationship in your Model
                                 'attribute' => 'type', // foreign key attribute that is shown to user
                                 'model' => "App\Models\BusinessType" // foreign key model
        ], 'update/create/both');

        $this->crud->setColumnDetails('Business Type', [
            // 1-n relationship
            'label' => "Business Type", // Table column heading
            'type' => "select",
            'name' => 'id', // the column that contains the ID of that connected entity;
            'entity' => 'businessType', // the method that defines the relationship in your Model
            'attribute' => "type", // foreign key attribute that is shown to user
            'model' => "App\Models\BusinessType", // foreign key model
        ]);
        //'business_type_id' field end

        //'signed_by' field start
        $this->crud->addField(['name' => 'signed_by', 'label' => 'Contract Signed By'], 'update/create/both');
        //'signed_by' field end

        //'visual' field start
        $this->crud->addField(['name' => 'visual', 'label' => 'Visual'], 'update/create/both');
        //'visual' field end

        //'mo' field start
        $this->crud->addField(['name' => 'mo', 'label' => 'MO'], 'update/create/both');
        //'mo' field end

        //'renew_by' field start
        $this->crud->addField(['name' => 'renew_by', 'label' => 'Renew By'], 'update/create/both');
        //'renew_by' field end

        //'ad_format_id' field start
        $this->crud->addField([  // Select
                                 'label' => "Format",
                                 'type' => 'select2',
                                 'name' => 'ad_format_id', // the db column for the foreign key
                                 'entity' => 'adFormat', // the method that defines the relationship in your Model
                                 'attribute' => 'format', // foreign key attribute that is shown to user
                                 'model' => "App\Models\AdFormat" // foreign key model
        ], 'update/create/both');

        $this->crud->setColumnDetails('Format', [
            // 1-n relationship
            'label' => "Format", // Table column heading
            'type' => "select",
            'name' => 'ad_format_id', // the column that contains the ID of that connected entity;
            'entity' => 'adFormat', // the method that defines the relationship in your Model
            'attribute' => "format", // foreign key attribute that is shown to user
            'model' => "App\Models\AdFormat", // foreign key model
        ]);
        //'ad_format_id' field end

        //'state_id' field start
        $this->crud->addField([  // Select
                                 'label' => "State",
                                 'type' => 'select2',
                                 'name' => 'state_id', // the db column for the foreign key
                                 'entity' => 'state', // the method that defines the relationship in your Model
                                 'attribute' => 'state', // foreign key attribute that is shown to user
                                 'model' => "App\Models\State" // foreign key model
        ], 'update/create/both');

        $this->crud->setColumnDetails('State', [
            // 1-n relationship
            'label' => "State", // Table column heading
            'type' => "select",
            'name' => 'state_id', // the column that contains the ID of that connected entity;
            'entity' => 'state', // the method that defines the relationship in your Model
            'attribute' => "state", // foreign key attribute that is shown to user
            'model' => "App\Models\State", // foreign key model
        ]);
        //'state_id' field end

        //'town_id' field start
        $this->crud->addField([  // Select
                                 'label' => "Town",
                                 'type' => 'select2',
                                 'name' => 'town_id', // the db column for the foreign key
                                 'entity' => 'town', // the method that defines the relationship in your Model
                                 'attribute' => 'town', // foreign key attribute that is shown to user
                                 'model' => "App\Models\Town" // foreign key model
        ], 'update/create/both');

        $this->crud->setColumnDetails('Town', [
            // 1-n relationship
            'label' => "Town", // Table column heading
            'type' => "select",
            'name' => 'town_id', // the column that contains the ID of that connected entity;
            'entity' => 'town', // the method that defines the relationship in your Model
            'attribute' => "town", // foreign key attribute that is shown to user
            'model' => "App\Models\Town", // foreign key model
        ]);
        //'town_id' field end

        //'site_location_id' field start
        $this->crud->addField([  // Select
                                 'label' => "Site Location",
                                 'type' => 'select2',
                                 'name' => 'site_location_id', // the db column for the foreign key
                                 'entity' => 'siteLocation', // the method that defines the relationship in your Model
                                 'attribute' => 'location', // foreign key attribute that is shown to user
                                 'model' => "App\Models\SiteLocation" // foreign key model
        ], 'update/create/both');

        $this->crud->setColumnDetails('Site Location', [
            // 1-n relationship
            'label' => "Site Location", // Table column heading
            'type' => "select",
            'name' => 'site_location_id', // the column that contains the ID of that connected entity;
            'entity' => 'siteLocation', // the method that defines the relationship in your Model
            'attribute' => "location", // foreign key attribute that is shown to user
            'model' => "App\Models\SiteLocation", // foreign key model
        ]);
        //'site_location_id' field end

        //'in_charge' field start
        $this->crud->addField(['name' => 'in_charge', 'label' => 'In Charge', 'type' => 'date'], 'update/create/both');
        //'in_charge' field end

        //'out_charge' field start
        $this->crud->addField(['name' => 'out_charge', 'label' => 'Out Charge', 'type' => 'date'], 'update/create/both');
        //'out_charge' field end

        //remove auto calculated fields
        $this->crud->removeFields(['duration', 'expiry'], 'update/create/both');

        //'rental', 'lighting', 'production' fields start
        $this->crud->addField([ // Table
                                'name' => 'costing',
                                'label' => 'Costing',
                                'type' => 'table',
                                'entity_singular' => 'costing', // used on the "Add X" button
                                'columns' => [
                                    'rental' => 'Rental',
                                    'lighting' => 'Lighting',
                                    'production' => 'Production'
                                ],
                                'max' => 1, // maximum rows allowed in the table
                                'min' => 1 // minimum rows allowed in the table
        ], 'update/crate/both');

        $this->crud->removeFields(['rental', 'lighting', 'production'], 'update/create/both');
        //'rental', 'lighting', 'production' fields end

        //'remarks' field start
        $this->crud->addField(['name' => 'remarks', 'label' => 'Remarks', 'type' => 'wysiwyg'], 'update/create/both');
        //'remarks' field end

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
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}

	public function index()
    {

        return parent::index(); // TODO: Change the autogenerated stub
    }
}
