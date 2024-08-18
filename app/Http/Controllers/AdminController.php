<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\HomePageSetting; // تأكد من استيراد الموديل

class AdminController extends Controller
{
    /**
     * Display the admin dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $settings = HomePageSetting::first(); // جلب إعدادات الصفحة الرئيسية
        return view('admin.dashboard', compact('settings')); // تمرير الإعدادات إلى العرض
    }

    /**
     * Display the users management view.
     *
     * @return \Illuminate\View\View
     */
    public function users()
    {
        $settings = HomePageSetting::first(); // جلب إعدادات الصفحة الرئيسية
        return view('admin.users', compact('settings')); // تمرير الإعدادات إلى العرض
    }

    /**
     * Display the settings view.
     *
     * @return \Illuminate\View\View
     */
    public function settings()
    {
        $settings = HomePageSetting::first(); // جلب إعدادات الصفحة الرئيسية
        return view('admin.settings', compact('settings')); // تمرير الإعدادات إلى العرض
    }

    /**
     * Display the form to edit admin settings.
     *
     * @return \Illuminate\View\View
     */
    public function editSettings()
    {
        $admin = User::where('is_admin', true)->first();
        $settings = HomePageSetting::first(); // جلب إعدادات الصفحة الرئيسية
        return view('admin.settings.edit', compact('admin', 'settings')); // تمرير الإعدادات إلى العرض
    }

    /**
     * Update the admin email address.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|unique:users,email',
            'current_email' => 'required|email'
        ]);

        $admin = User::where('email', $request->current_email)
                     ->where('is_admin', true)
                     ->first();

        if ($admin) {
            $admin->email = $request->new_email;
            $admin->save();

            return redirect()->route('admin.settings.edit')->with('success', 'L\'adresse email a été modifiée avec succès.');
        } else {
            return redirect()->route('admin.settings.edit')->with('error', 'L\'administrateur n\'a pas été trouvé.');
        }
    }

    /**
     * Update the admin password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $admin = User::where('is_admin', true)->first();

        if ($admin && Hash::check($request->current_password, $admin->password)) {
            $admin->password = Hash::make($request->new_password);
            $admin->save();

            return redirect()->route('admin.settings.edit')->with('success', 'Le mot de passe a été modifié avec succès.');
        } else {
            return redirect()->route('admin.settings.edit')->with('error', 'Le mot de passe actuel est incorrect.');
        }
    }
}
