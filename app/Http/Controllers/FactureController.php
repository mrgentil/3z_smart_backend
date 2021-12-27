<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\AjoutTable;
use Illuminate\Http\Request;
use App\Models\CommandeTempo;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $factures = Facture::paginate(10);
        return view('commandes.facture', compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $facture = Facture::find($id);
        $produits = $facture->products()->withPivot('quantity', 'price_unit', 'user_id', 'server_id')->get();
        return view('commandes.show', compact('produits', 'facture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facture $facture)
    {
        //
    }

    public function facture($id)
    {
        try {
            DB::beginTransaction();
            $amount = 0;
            $commandes = CommandeTempo::where('table_id', $id)->get();
            $facture = Facture::create([
                'table_id' => $id,
                'user_id' => auth()->user()->id,
                'server_id' => auth()->user()->id,
                'amount' => 0

            ]);

            foreach ($commandes as $item) {
                $product = $item->product;

                $amount += $item->quantity * $product->price_product;
                $facture->products()->attach($item->product->id, [
                    'quantity' => $item->quantity,
                    'price_unit' => $product->price_product,
                    'user_id' => $item->user_id,
                    'server_id' => $item->server_id,


                ]);
                $product->stock -= $item->quantity;
                $product->save();
            }
            $facture->amount = $amount;
            $facture->save();
            CommandeTempo::where('table_id', $id)->delete();
            DB::commit();

            return redirect()->route('facture.index');
        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;
        }
    }
}
