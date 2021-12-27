<?php

namespace App\Models;

use App\Models\Table;
use App\Models\Facture;
use App\Models\Commande;
use App\Models\CarteMenu;
use App\Models\Categorie;
use App\Models\CommandeTempo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price_product',
        'stock',
        'categorie_id',
        'notif_min',
        'portion',
        'quantity_total_portion',
        'price_portion',

    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function menus()
    {
        return $this->belongsToMany(CarteMenu::class);
    }
    public function commandes()
    {
        return $this->belongsToMany(Commande::class);
    }
    public function commandeTempo()
    {
        return $this->hasOne(CommandeTempo::class);
    }

    public function factures()
    {
        return $this->belongsToMany(Facture::class);
    }
}
