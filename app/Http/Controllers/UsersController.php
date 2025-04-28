<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Users";
        $datas = User::with('roles')->get();
        return view('users.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('is_active', 1)->get();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $user->roles()->attach($request->roles);
        return redirect()->to('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('edit', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
            'password' => $request->password ? $request->password : $user->password,

        ]);
        if ($request->has('roles')) {
            $user->roles()->sync($request->roles);
        }
        return redirect()->to('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::find($id);

        $userRoles = UserRole::where('user_id', (string)$id);
        if ($userRoles->exists()) {
            $userRoles->delete();
        }

        $user->delete();

        return redirect()->to('users');
    }
}
