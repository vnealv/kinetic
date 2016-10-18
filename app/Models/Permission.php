<?php
/**
 * Created by PhpStorm.
 * User: neal
 * Date: 10/10/2016
 * Time: 5:05 PM
 */
namespace App\Models;

use Zizaco\Entrust\EntrustPermission;
use Backpack\CRUD\CrudTrait;

class Permission extends EntrustPermission
{
    use CrudTrait;

    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'display_name', 'description'];
}