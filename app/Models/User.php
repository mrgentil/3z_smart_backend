<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Gender;
use App\Models\Commande;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstName',
        'lastNAme',
        'adress',
        'phone',
        'genre_id',
        'avatar',
        'role_id',
        'password',
        'gender_id'
    ];

    public function getLgLogoAttribute()
    {
        return  asset('images' . DIRECTORY_SEPARATOR
            . 'avatar' . DIRECTORY_SEPARATOR . 'lg' . DIRECTORY_SEPARATOR . $this->avatar);
    }

    public function getSmLogoAttribute()
    {
        return  asset('images' . DIRECTORY_SEPARATOR
            . 'avatar' . DIRECTORY_SEPARATOR . 'sm' . DIRECTORY_SEPARATOR . $this->avatar);
    }

    public function getXsLogoAttribute()
    {
        return  asset('images' . DIRECTORY_SEPARATOR
            . 'avatar' . DIRECTORY_SEPARATOR . 'xs' . DIRECTORY_SEPARATOR . $this->avatar);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function commande()
    {
        return $this->hasOne(Commande::class);
    }
}
