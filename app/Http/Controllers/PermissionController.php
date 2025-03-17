<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionStoreRequest;

use Illuminate\Http\Request;

use App\Models\Permission;

use App\Models\Role;

use Carbon\Carbon;

class PermissionController extends Controller
{
    public function index()
    {

        $permissions = Permission::with(['role'])->orderBy('id', 'DESC')->get(['role_id','id']);
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        $roles = Role::latest()->get();
        return view('admin.permission.create', compact('roles'));
    }

    public function store(PermissionStoreRequest $request)
    {

       
        Permission::create($request->all());

        return Redirect()->route('permission.index')->with('success', 'Permission Added');
    }

    
    public function edit($per_id){
        $roles = Role::latest()->get();
        $permission = Permission::findOrFail($per_id);
        return view('admin.permission.edit',compact('roles','permission'));
    }

    public function update(Request $request, $per_id){

        Permission::findOrFail($per_id)->Update($request->all());

        return Redirect()->route('permission.index')->with('success', 'Permission successfully Updated');
    }

    // public function destroy($per_id)
    // {
    //     Permission::findOrFail($per_id)->delete();
    //     return Redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return Redirect()->back()->with('delete', 'successfully Deleted');
    }
}
