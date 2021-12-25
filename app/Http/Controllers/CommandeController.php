<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Table;
use App\Models\Product;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $commandes = Commande::paginate(10);
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tables = Table::all();
        $products = Product::all();
        return view('commandes.create', compact('tables', 'products'));
    }


    /**
     * @return array
     */
    private function generateInvoiceCode(): array
    {
        $prefixCommande = 'CMD/' . date('Y') . '/';
        $prefixFacture = 'FAC/' . date('Y') . '/';
        $prefixClient = 'CLIENT/' . date('Y') . '/';

        $code = 0;
        $lastCommande = Commande::query()->select('id')->orderByDesc('id')->first();


        if ($lastCommande) {
            $code = $lastCommande->id;
        }

        $code++;

        return [
            $prefixCommande . sprintf('%05d', $code),
            $prefixFacture . sprintf('%05d', $code),
            $prefixClient . sprintf('%05d', $code),
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        [$codeCommande, $codeFacture, $codeClient] = $this->generateInvoiceCode();

        //dd($codeCommande, $codeFacture, $codeClient);

        $data = $request->validate([
            'quantity' => 'required|numeric',
            'product_id' => 'required|exists:products,id',
            'table_espace_id' => 'required|exists:tables,id',
        ]);

        try {

            // $carteMenu->products()->sync($data['product_id']);


            $users = auth()->user()->id;

            $data['user_id'] = $users;
            $data['num_commande'] = $codeCommande;
            $data['num_client'] = $codeClient;
            $data['num_facture'] = $codeFacture;

            //  return $this->belongs_to('User')->select(array('id', 'username'));
            $product_price = Product::select('price_product')->get();


            $amount = Product::select('price_product')->get() * $request->quantity;
            dd($amount);

            $data['amount'] = $amount;
            Terrain::query()->where('id', $request->terrain_id)->update([
                'state' => 'vendu'
            ]);

            $paiements = Paiement::create($data);

            return redirect()->route('paiements.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
