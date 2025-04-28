<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Models\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Roles";
        $datas = Role::get();
        return view('roles.index', compact('datas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $is_active = $request->has('is_active') ? 1 : 0;
        // return $is_active;
        Role::create([
            'name' => $request->name,
            'is_active' => $is_active,
        ]);

        return redirect()->to('roles');
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
        $edit = Role::find($id);
        return view('roles.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $is_active = $request->has('is_active') ? 1 : 0;
        $role = Role::find($id);
        Role::where('id', $id)->update([
            'name' => $request->name,
            'is_active' => $is_active,

        ]);
        return redirect()->to('roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $role = Role::find($id);
        $user = User::find($id);

        $userRoles = UserRole::where('user_id', (string)$id);
        if ($userRoles->exists()) {
            $userRoles->delete();
        }

        $role->delete();

        return redirect()->to('roles');
    }
}
