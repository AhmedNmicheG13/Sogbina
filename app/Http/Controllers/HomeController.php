<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePageSetting; // ÙÙØªØ¹Ø§ÙÙ ÙØ¹ ÙÙÙØ°Ø¬ Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ©

class HomeController extends Controller
{
    public function index()
    {
        // Ø§ÙØ­ØµÙÙ Ø¹ÙÙ Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ©
        $settings = HomePageSetting::first();
        return view('front.index', compact('settings'));
    }

    public function showMenu()
    {
        // Ø§ÙØ­ØµÙÙ Ø¹ÙÙ Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª Ø§ÙØµÙØ­Ø© Ø§ÙØ±Ø¦ÙØ³ÙØ©
        $settings = HomePageSetting::first();
        return view('front.menu_nav', compact('settings'));
    }

public function show()
{
    $settings = Setting::first(); // أو أي طريقة مناسبة لجلب الإعدادات
    return view('front.about', compact('settings'));
}

}
