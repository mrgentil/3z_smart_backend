<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'role_id',

    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
