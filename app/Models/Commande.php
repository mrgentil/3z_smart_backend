<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Table;
use App\Models\Product;
use Carbon\Traits\Creator;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        /*'ste',*/
        'server_name',
        'author',
        'amount',
        'table_id',
        'user_id',
        'facture_id',


    ];
    protected $guarded = [];

    public $dates = ['created_at', 'updated_at'];

    public function getStateAtDateFormatAttribute()
    {
        return ucfirst((new Carbon($this->state_at))->translatedFormat('l, d F Y'));
    }

    public function getCreatedAtAttribute($created_at)
    {
        return Date::make($created_at)->format(' j F, Y');
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}
