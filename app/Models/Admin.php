<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // تحديد اسم الجدول إذا كان يختلف عن اسم النموذج بالجمع
    protected $table = 'admins';

    // تحديد الحقول القابلة للتعبئة
    protected $fillable = ['name', 'email', 'password'];

    // إذا كنت تستخدم التشفير
    protected $hidden = ['password'];
}
