<?php

namespace App\Repositories;

use App\Repositories\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAllRoles()
    {
        return Role::all();
    }
}
