<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }*/

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

        return redirect()->route('admin.users.index')->with('info','Se asignó el rol con exito');
    }
    
    public function destroy(user $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('info','El usuario se elimino con exito');
    }
}
