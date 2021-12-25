<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Table;
use App\Models\Product;
use App\Models\CarteMenu;
use App\Models\Categorie;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarteMenuController extends Controller
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
        $menus = CarteMenu::with(['products', 'table'])->paginate(10);

        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        $espaces = Table::all();
        return view('menus.create', compact('products', 'espaces'));
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
            'table_espace_id' => 'required|exists:tables,id',
            'product_id' => 'required|exists:products,id',
        ]);
        try {

            $menu = CarteMenu::create($data);
            $menu->products()->sync($data['product_id']);
            Alert::success('Félicitations', 'Carte Menu Ajoutée avec Succès');
            return redirect()->route('menus.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarteMenu  $carteMenu
     * @return \Illuminate\Http\Response
     */
    public function show(int $carteMenu)
    {
        //
        $carteMenu = CarteMenu::findOrFail($carteMenu);


        return view('menus.show', compact('carteMenu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarteMenu  $carteMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(int $carteMenu)
    {
        //
        $products = Product::all();
        $menus = CarteMenu::find($carteMenu);
        $tables = Table::all();
        $menu_products = $menus->products->pluck('id')->toArray();



        return view('menus.edit', compact('menus', 'tables', 'menu_products', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarteMenu  $carteMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $carteMenu)
    {
        //

        $carteMenu = CarteMenu::find($carteMenu);

        $data = $request->validate([
            'name' => 'required|string',
            'product_id.*' => 'required|string',
            'table_espace_id' => 'required|exists:tables,id',
        ]);


        $carteMenu->update($data);

        $carteMenu->products()->sync($data['product_id']);

        Alert::success('Félicitations', 'Menu  Modifié avec Succès');
        try {
            return redirect()->route('menus.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarteMenu  $carteMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $carteMenu)
    {
        //
        CarteMenu::findOrFail($carteMenu)->delete();
        Alert::success('Félicitations', 'Menu  Supprimé avec Succès');
        return redirect()->back();
    }
}
