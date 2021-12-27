<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjoutTable extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'espace_id'

    ];

    public function espace()
    {
        return $this->belongsTo(Table::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}
