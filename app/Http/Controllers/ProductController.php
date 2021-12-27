<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products = Product::with('categorie')->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Categorie::all();


        return view('products.create', compact('categories'));
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
            'price_product' => 'required|string',
            'stock' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'notif_min' => 'numeric|nullable',
            'portion' => '',
            'price_portion' => '',

        ]);


        try {


            $quantity = $request->stock * $request->price_portion;
            $data['quantity_total_portion'] = $quantity;
            $product = Product::create($data);
            Alert::success('Félicitations', 'Produit  Ajouté avec Succès');
            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $products = Product::find($product->id);
        $categories = Categorie::all();

        return view('products.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $data = $request->validate([
            'name' => 'string',
            'price_product' => 'string',
            'stock' => 'string',
            'categorie_id' => 'exists:categories,id',
            'notif_min' => 'string',
            'portion' => '',
            'quantity_total_portion' => 'string',
            'price_portion' => '',
        ]);


        $product->update($data);
        Alert::success('Félicitations', 'Produit  Modifié avec Succès');
        try {
            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        Alert::success('Félicitations', 'Produit  Supprimé avec Succès');
        return redirect()->back();
    }
}
