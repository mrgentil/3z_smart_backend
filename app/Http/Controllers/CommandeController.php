<?php

namespace App\Http\Controllers;

use App\Models\AjoutTable;
use App\Models\Role;
use App\Models\Table;
use App\Models\Product;
use App\Models\Commande;
use App\Models\CommandeTempo;
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
        $tables = AjoutTable::all();
        $products = Product::all();
        return view('commandes.create', compact('tables', 'products'));
    }


    /**
     * @return array
     */
    /* private function generateInvoiceCode(): array
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
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        /* [$codeCommande, $codeFacture, $codeClient] = $this->generateInvoiceCode(); */

        //dd($codeCommande, $codeFacture, $codeClient);

        $data = $request->validate([
            'quantity' => 'required',
            'product_id' => 'required',
            'table_id' => 'required',
        ]);

        try {
            $commandData = [];
            $user_id = auth()->user()->id;



            for ($i = 1; $i < count($data['product_id']); $i++) {
                $commandData[] = [
                    "product_id" => $data['product_id'][$i],
                    "quantity" => $data['quantity'][$i],
                    "table_id" => $data['table_id'],
                    "user_id" => $user_id,
                    "server_id" => $user_id,
                    "state" => "A Régulariser"
                ];
            }

            CommandeTempo::insert($commandData);

            return redirect()->route('validation');
            // $carteMenu->products()->sync($data['product_id']);
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
    public function update(Request $request, int $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $commande)
    {
        //
    }


    public function validations()
    {
        $tables = AjoutTable::all();
        return view('commandes.validations', compact('tables'));
    }

    public function validationsShow($id)
    {
        $commande = [];
        $commandes = CommandeTempo::where('table_id', $id)->get();
        foreach ($commandes as $key) {
            $produit = $key->product;

            $commande[] = [
                "id" => $key->id,
                "product" => $produit,
                "quantity" => $key->quantity,

                "user" => $key->user,
                "server_id" => $key->user,
                "state" => "A Régulariser",
                "price_product" => $produit->price_product,
                "price_total" => $produit->price_product * $key->quantity,
            ];
        }

        $tables = AjoutTable::all();
        $table = AjoutTable::find($id);
        return view('commandes.allValidation', compact('commandes', 'tables', 'table', 'commande'));
    }

    public function ChangeState($id)
    {
        $commandes = CommandeTempo::find($id);
        $commandes->state = "A Régulariser";
        $commandes->save();
        return redirect()->route('validation.show', $commandes->table_id);
    }
}
