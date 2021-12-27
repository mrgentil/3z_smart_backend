<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\AjoutTable;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AjoutTableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $tables =  AjoutTable::paginate(10);

        return view('tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $espaces = Table::all();
        return view('tables.create', compact('espaces'));
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
            'espace_id' => 'required|exists:tables,id',
        ]);


        try {

            $table = AjoutTable::create($data);
            Alert::success('Félicitations', 'Table  Ajoutée avec Succès');
            return redirect()->route('tables.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AjoutTable  $table
     * @return \Illuminate\Http\Response
     */
    public function show(AjoutTable $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AjoutTable  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(AjoutTable $table)
    {
        //
        $tables = AjoutTable::find($table->id);
        $espaces = Table::all();

        // $table_table =>pluck('id')->toArray();

        return view('tables.edit', compact('tables', 'espaces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AjoutTable  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AjoutTable $table)
    {
        //
        $data = $request->validate([
            'name' => 'string|nullable',
            'espace_id' => 'string|nullable',
        ]);


        $table->update($data);
        Alert::success('Félicitations', 'Table  Modifiée avec Succès');
        try {
            return redirect()->route('tables.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AjoutTable  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(AjoutTable $table)
    {
        //
        $table->delete();
        Alert::success('Félicitations', 'Table  Supprimé avec Succès');
        return redirect()->back();
    }
}
