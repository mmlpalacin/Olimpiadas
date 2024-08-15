<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function edit(User $user)
    {
        $roles = role::all();
        return view ('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, user $user)
    {
        if ($request->role) {
            // Sincronizar roles
            $user->roles()->sync($request->role);
        }

        return redirect()->route('admin.users.index')->with('success','Se asignó el rol con exito');
    }
    
    public function destroy(user $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success','El usuario se elimino con exito');
    }
}
