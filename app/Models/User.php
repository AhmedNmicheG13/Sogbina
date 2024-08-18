<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; // Ø¥Ø¶Ø§ÙØ© ÙØ°Ù Ø§ÙØ³Ø·Ø±

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles; // Ø¥Ø¶Ø§ÙØ© HasRoles ÙÙØ§

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
        'admin_data',
        'profile_picture',
        'car_brand',
        'car_serial',
        'national_id',
        'national_id_recto',
        'national_id_verso',
        'country',
        'city',
        'postal_code',
        'phone',
        'rib_bancaire',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the trips for the user.
     */
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    /**
     * Get the trajets for the user.
     */
    public function trajets()
    {
        return $this->hasMany(Trajet::class);
    }

    /**
     * Get the bookings for the user.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
