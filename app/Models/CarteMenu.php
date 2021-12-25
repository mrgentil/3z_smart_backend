<?php

namespace App\Models;

use App\Models\Table;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarteMenu extends Model
{
    use HasFactory;
    protected $fillable = [

        'table_espace_id',
        'name'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_espace_id');
    }
}
