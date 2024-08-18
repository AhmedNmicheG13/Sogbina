<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\Trajet;
use App\Models\HomePageSetting; // تأكد من استيراد الموديل
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $settings = HomePageSetting::first(); // جلب إعدادات الصفحة الرئيسية
        
        if ($request->ajax()) {
            $villes = Ville::where('name', 'LIKE', "%{$query}%")->get(['name']);
            return response()->json($villes);
        } else {
            $villes = Ville::where('name', 'LIKE', "%{$query}%")->get();
            return view('front.covoit_index', compact('villes', 'settings')); // تمرير الإعدادات إلى العرض
        }
    }

    public function results(Request $request)
    {
        $depart = $request->input('depart');
        $arrive = $request->input('arrive');
        $date = $request->input('date');
        $passengers = $request->input('passengers');
        $settings = HomePageSetting::first(); // جلب إعدادات الصفحة الرئيسية
        
        $trajets = Trajet::where('depart', 'LIKE', "%{$depart}%")
            ->where('arrivee', 'LIKE', "%{$arrive}%")
            ->where('date', $date)
            ->where('places', '>=', $passengers)
            ->get();

        return view('front.results', compact('trajets', 'settings')); // تمرير الإعدادات إلى العرض
    }
}
