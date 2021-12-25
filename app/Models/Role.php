<?php

namespace App\Models;

use App\Models\User;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
