<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;

use Carbon\Carbon;

class RoleController extends Controller
{
 public function index(){
    $roles=Role::latest()->get();
    return view('admin.roles.index',compact('roles'));
 }

 public function create(){
    $roles=Role::latest()->get();
    return view('admin.roles.create',compact('roles'));
 }

 public function store(Request $request)
 {
     $request->validate([
         'name' => 'required|max:255',
     ]);

     Role::insert([
         'name' => $request->name,
         'created_at' => Carbon::now(),
     ]);
     return Redirect()->route('role.index')->with('success', 'Role Added');
 }

 public function edit($role_id)
 {
     $role = Role::findOrFail($role_id);
     return view('admin.roles.edit', compact('role'));
 }

 public function update(Request $request, $role_id)
 {
     $role_id = $request->id;

     Role::findOrFail($role_id)->Update([
         'name' => $request->name,
         'update_at' => Carbon::now(),
     ]);

     return Redirect()->route('role.index')->with('success', 'Role successfully Updated');
 }

//  public function destroy($role_id)
//  {
//      Role::findOrFail($role_id)->delete();
//      return Redirect()->back()->with('delete', 'successfully Deleted');
//  }

public function destroy(Role $role)
{
    $role->delete();
    return Redirect()->back()->with('delete', 'successfully Deleted');
}

}
