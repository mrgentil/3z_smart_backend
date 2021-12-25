<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $roles = Role::paginate(10);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $modules = Module::all();

        return view('roles.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string',
            'module_id' => 'required',
        ]);
        try {

            $role = Role::create($data);
            $role->modules()->sync($data['module_id']);
            Alert::success('Félicitations', 'Niveau Accès Ajouté avec Succès');
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $roles = Role::find($role->id);
        $modules = Module::all();
        $role_modules = $roles->modules->pluck('id')->toArray();

        return view('roles.edit', compact('roles', 'modules', 'role_modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $data = $request->validate([
            'name' => 'string|nullable',
            'module_id.*' => 'string|nullable',
        ]);
        $role->update($data);
        $role->modules()->sync($data['module_id']);

        Alert::success('Félicitations', 'Niveau Accès Modifié avec Succès');
        try {
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        Alert::success('Félicitations', 'Niveau Accès Supprimé avec Succès');
        return redirect()->back();
    }
}
