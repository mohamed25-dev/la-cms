<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function store (Request $request) 
    {
        $this->role->find($request->role_id)->permissions()->sync($request->permission);
        return back()->with('success', trans('alerts.success'));
    }

    public function getPermissionsByRole (Request $request) 
    {
        $permissions = $this->role->find($request->roleId)->permissions()->pluck('permission_id');
        return $permissions;
    }
}
