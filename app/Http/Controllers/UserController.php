<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $role = Role::latest()->get();
        $users = User::orderBy('id', 'DESC')->get();

        return view('admin.users.index', compact('users', 'role'));
    }

    public function create()
    {
        $roles = Role::latest()->get();
        $users = User::latest()->get();

        return view('admin.users.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'phone' => 'required|max:255',
            'role_id' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        $imag = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        Image::make($imag)->resize(270, 270)->save(public_path('upload/user/'.$name_gen));
        $img_url = 'upload/user/'.$name_gen;

        User::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'image' => $img_url,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('user.index')->with('success', 'User Added');
    }

    public function edit($user_id)
    {
        $roles = Role::latest()->get();
        $user = User::findOrFail($user_id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        if ($request->hasFile('image')) {
            $imag = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save('upload/user/'.$name_gen);
            $img_url = 'upload/user/'.$name_gen;
        } else {
            $img_url = $user->image;
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            'image' => $img_url,
        ]);

        return redirect()->route('user.index')->with('success', 'User successfully Updated');
    }

    // public function destroy($user_id)
    // {
    //     $image = User::findOrFail($user_id);
    //     $img = $image->image;
    //     unlink($img);

    //     User::findOrFail($user_id)->delete();
    //     return redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }

    public function profile()
    {
        // $user = User::with(['user'])->where('id', $user_id)->latest()->first();
        $user = Auth::user();

        return view('admin.profile', compact('user'));
    }
}
