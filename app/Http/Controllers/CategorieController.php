<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class   CategorieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categorie::paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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

            $categorie = Categorie::create($data);

            Alert::success('Félicitations', 'Categorie Ajoutée avec Succès');
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(int $categorie)
    {
        //
        $categorie = Categorie::find($categorie);
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $categorie)
    {
        $categorie = Categorie::find($categorie);
        //
        $data = $request->validate([
            'name' => 'required|string',

        ]);
        $categorie->update($data);
        Alert::success('Félicitations', 'Categorie Modifiée avec Succès');
        try {
            return redirect()->route('categories.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $categorie)
    {
        Categorie::findOrFail($categorie)->delete();

        Alert::success('Félicitations', 'Categorie Supprimée avec Succès');
        return redirect()->back();
    }
}
