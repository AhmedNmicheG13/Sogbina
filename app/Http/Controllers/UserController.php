<?php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // الحصول على جميع المستخدمين
        return view('users.index', compact('users')); // عرضهم في ملف Blade
    }
}
