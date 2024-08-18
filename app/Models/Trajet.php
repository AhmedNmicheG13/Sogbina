<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;

    protected $fillable = [
        'depart',
        'arrivee',
        'date',
        'heure_depart', // تعديل الحقل من heure إلى heure_depart
        'heure_arrivee', // إضافة الحقل الجديد heure_arrivee
        'places',
        'prix',
        'description',
        'user_id', // إضافة الحقل user_id لجعله قابلاً للملء
    ];

    // تعريف العلاقة بين Trajet و User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
