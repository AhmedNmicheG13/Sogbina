<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trajet;
use App\Models\Ville;
use App\Models\HomePageSetting;
use Illuminate\Support\Facades\Auth;

class TrajetController extends Controller
{
    public function index()
    {
        // Récupérer l'utilisateur actuel
        $user = Auth::user();

        // Récupérer les trajets publiés par l'utilisateur actuel avec les données associées
        $trajets = Trajet::where('user_id', $user->id)->with('user')->get();

        // Récupérer les paramètres de la page d'accueil
        $settings = HomePageSetting::first();

        // Afficher la page des trajets et transmettre les données
        return view('front.afficher_trajets', compact('trajets', 'settings'));
    }

    public function create()
    {
        $villes = Ville::all();
        $settings = HomePageSetting::first();
        return view('front.publier_trajet', compact('villes', 'settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'depart' => 'required|string|max:255',
            'arrivee' => 'required|string|max:255',
            'date' => 'required|date',
            'heure_depart' => 'required', 
            'heure_arrivee' => 'required', 
            'places' => 'required|integer',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Ajouter user_id aux données envoyées
        $data = $request->all();
        $data['user_id'] = Auth::id();

        Trajet::create($data);

        return redirect()->route('trajet.create')->with('success', 'Trajet publié avec succès!');
    }

    public function edit($id)
    {
        $trajet = Trajet::findOrFail($id);
        $villes = Ville::all();
        $settings = HomePageSetting::first();
        return view('front.editer_trajet', compact('trajet', 'villes', 'settings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'depart' => 'required|string|max:255',
            'arrivee' => 'required|string|max:255',
            'date' => 'required|date',
            'heure_depart' => 'required', 
            'heure_arrivee' => 'required', 
            'places' => 'required|integer',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $trajet = Trajet::findOrFail($id);

        // Mettre à jour les données envoyées avec l'user_id actuel
        $data = $request->all();
        $data['user_id'] = $trajet->user_id; // conserver l'user_id actuel

        $trajet->update($data);

        return redirect()->route('trajet.edit', $trajet->id)->with('success', 'Trajet mis à jour avec succès!');
    }

    public function destroy($id)
    {
        $trajet = Trajet::findOrFail($id);
        $trajet->delete();

        return redirect()->route('trajet.create')->with('success', 'Trajet supprimé avec succès!');
    }
}
