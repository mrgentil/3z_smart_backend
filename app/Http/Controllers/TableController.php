<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Table;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TableController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tables = Table::paginate(10);
        return view('espaces.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('espaces.create');
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

        ]);
        try {

            $table = Table::create($data);
            Alert::success('Félicitations', 'Espace Ajouté avec Succès');
            return redirect()->route('espaces-tables.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(int $table)
    {
        //
        $tables = Table::find($table);


        return view('espaces.edit', compact('tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $table)
    {
        //
        $table = Table::find($table);
        $data = $request->validate([
            'name' => 'string|nullable',

        ]);
        $table->update([
            'name' => $data['name'],

        ]);
        Alert::success('Félicitations', 'Espace Modifié avec Succès');
        try {
            return redirect()->route('espaces-tables.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $table)
    {
        //
        Table::findOrFail($table)->delete();
        Alert::success('Félicitations', 'Espace Supprimé avec Succès');
        return redirect()->back();
    }
}
