<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\HomePageSetting;

class ProfileController extends Controller
{
    public function edit()
    {
        // Pass the user's data and home page settings to the view
        $settings = HomePageSetting::first();
        return view('front.modifier_profile', compact('settings'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the user's data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'car_brand' => 'required|string|max:255',
            'car_serial' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'national_id_recto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'national_id_verso' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|string|max:255',
            'rib_bancaire' => 'required|string|max:255',
        ]);

        // Update the user's data
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/images/' . $user->profile_picture);
            }
            $imageName = time() . '_profile.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images'), $imageName);
            $user->profile_picture = $imageName;
        }

        // Handle national ID recto upload
        if ($request->hasFile('national_id_recto')) {
            if ($user->national_id_recto) {
                Storage::delete('public/national_ids/' . $user->national_id_recto);
            }
            $rectoName = time() . '_recto.' . $request->national_id_recto->extension();
            $request->national_id_recto->move(public_path('national_ids'), $rectoName);
            $user->national_id_recto = $rectoName;
        }

        // Handle national ID verso upload
        if ($request->hasFile('national_id_verso')) {
            if ($user->national_id_verso) {
                Storage::delete('public/national_ids/' . $user->national_id_verso);
            }
            $versoName = time() . '_verso.' . $request->national_id_verso->extension();
            $request->national_id_verso->move(public_path('national_ids'), $versoName);
            $user->national_id_verso = $versoName;
        }

        // Update the rest of the user's data
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->car_brand = $request->car_brand;
        $user->car_serial = $request->car_serial;
        $user->national_id = $request->national_id;
        $user->phone = $request->phone;
        $user->rib_bancaire = $request->rib_bancaire;
        $user->save();

        // Redirect with success message
        return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès');
    }

    public function deletePicture()
    {
        $user = Auth::user();
        if ($user->profile_picture) {
            Storage::delete('public/images/' . $user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }
        return back()->with('success', 'Photo de profil supprimée avec succès.');
    }

    public function deleteNationalIdRecto()
    {
        $user = Auth::user();
        if ($user->national_id_recto) {
            Storage::delete('public/national_ids/' . $user->national_id_recto);
            $user->national_id_recto = null;
            $user->save();
        }
        return back()->with('success', 'Carte nationale recto supprimée avec succès.');
    }

    public function deleteNationalIdVerso()
    {
        $user = Auth::user();
        if ($user->national_id_verso) {
            Storage::delete('public/national_ids/' . $user->national_id_verso);
            $user->national_id_verso = null;
            $user->save();
        }
        return back()->with('success', 'Carte nationale verso supprimée avec succès.');
    }
}
