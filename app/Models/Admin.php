<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'firstName',
        'lastName',
        'adress',
        'phone',
        'genre',
        'user_id',
        'email',
        'password',
        'permission_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
}
