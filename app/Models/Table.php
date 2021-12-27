<?php

namespace App\Models;


use App\Models\Commande;
use App\Models\CarteMenu;
use App\Models\AjoutTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',

    ];
    public function menu()
    {
        return $this->hasOne(CarteMenu::class);
    }
    public function commande()
    {
        return $this->hasMany(Commande::class);
    }
    public function ajoutTable()
    {
        return $this->hasMany(AjoutTable::class);
    }
}
