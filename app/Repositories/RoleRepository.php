<?php
namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface{

    public function getAllRoles()
    {
        return Role::select('id','description')->get();
    }
}