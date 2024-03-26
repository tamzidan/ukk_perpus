<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('user.user_index', compact('users', 'roles');)
    }
    public function create()
    {
        $roles = Role::all();
        return view('user.user_create', compact('roles'));
    }

    public function store(Request $request)
    {
    $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|unique:users,email',
    'nama' => 'required|string|min:8',
    'roles' => 'required|array',
    ]);
    $user = new User();
    $user-> name = $request;
    $user-> email = $request->email;
    $user-> passsword = bcrypt($request->password);
    $user->save();

    $user->assignRole($request->roles);
    return redirect()->route('user.index')->with('succes', 'user berhasil ditambahkan');
    }
}

