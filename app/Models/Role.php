<?php
/**
 * Created by PhpStorm.
 * User: neal
 * Date: 10/10/2016
 * Time: 5:04 PM
 */
namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use Backpack\CRUD\CrudTrait;

class Role extends EntrustRole
{
    use CrudTrait;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'display_name', 'description'];
}