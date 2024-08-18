<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomePageSetting;
use Illuminate\Support\Facades\Storage;

class HomePageSettingController extends Controller
{
    public function edit()
    {
        // Ø¬ÙØ¨ Ø§ÙØ¥Ø¹Ø¯Ø§Ø¯Ø§Øª Ø§ÙØ­Ø§ÙÙØ©
        $settings = HomePageSetting::first();
        
        // ØªÙØ±ÙØ± Ø§ÙØ¥Ø¹Ø¯Ø§Ø¯Ø§Øª Ø¥ÙÙ Ø§ÙØ¹Ø±Ø¶
        return view('admin.homepage_settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        // Ø§ÙØªØ­ÙÙ ÙÙ ØµØ­Ø© Ø§ÙØ¨ÙØ§ÙØ§Øª
        $request->validate([
            'header_title' => 'required|string|max:255',
            'buton_color' => 'required|string|size:7',
            'header_color_large' => 'nullable|string|size:7',
            'text_color_menu' => 'nullable|string|size:7',
            'site_text_color' => 'nullable|string|size:7',
            'header_subtitle' => 'nullable|string|max:255',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'seo_slug' => 'nullable|string|max:255',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'page_title' => 'nullable|string|max:255',
            'about_text' => 'nullable|string',
        ]);

        // Ø¬ÙØ¨ Ø§ÙØ¥Ø¹Ø¯Ø§Ø¯Ø§Øª Ø£Ù Ø¥ÙØ´Ø§Ø¡ Ø¬Ø¯ÙØ¯Ø© Ø¥Ø°Ø§ ÙÙ ØªÙÙ ÙÙØ¬ÙØ¯Ø©
        $settings = HomePageSetting::first();
        if (!$settings) {
            $settings = new HomePageSetting();
        }

        // ØªØ­Ø¯ÙØ« Ø§ÙÙÙÙ
        $settings->header_title = $request->header_title;
        $settings->buton_color = $request->buton_color;
        $settings->header_color_large = $request->header_color_large ?: '#000000'; // Ø§ÙØªØ±Ø§Ø¶Ù
        $settings->text_color_menu = $request->text_color_menu ?: '#000000'; // Ø§ÙØªØ±Ø§Ø¶Ù
        $settings->site_text_color = $request->site_text_color ?: '#FFFFFF'; // Ø§ÙØªØ±Ø§Ø¶Ù
        $settings->header_subtitle = $request->header_subtitle;
        $settings->seo_title = $request->seo_title;
        $settings->seo_description = $request->seo_description;
        $settings->slug = $request->slug;
        $settings->seo_slug = $request->seo_slug;
        $settings->page_title = $request->page_title;
        $settings->about_text = $request->about_text;

        // ÙØ¹Ø§ÙØ¬Ø© Ø§ÙÙØ§ÙÙÙÙÙ
        if ($request->hasFile('favicon')) {
            if ($settings->favicon) {
                Storage::delete('public/images/' . $settings->favicon);
            }
            $faviconPath = time() . '_favicon.' . $request->favicon->extension();
            $request->favicon->move(public_path('images'), $faviconPath);
            $settings->favicon = $faviconPath;
        }

        // ÙØ¹Ø§ÙØ¬Ø© Ø§ÙØ´Ø¹Ø§Ø±
        if ($request->hasFile('logo')) {
            if ($settings->logo) {
                Storage::delete('public/images/' . $settings->logo);
            }
            $logoPath = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('images'), $logoPath);
            $settings->logo = $logoPath;
        }

        // ÙØ¹Ø§ÙØ¬Ø© ØµÙØ±Ø© Ø§ÙØ±Ø£Ø³
        if ($request->hasFile('header_image')) {
            if ($settings->header_image) {
                Storage::delete('public/images/' . $settings->header_image);
            }
            $headerImagePath = time() . '_header_image.' . $request->header_image->extension();
            $request->header_image->move(public_path('images'), $headerImagePath);
            $settings->header_image = $headerImagePath;
        }

        $settings->save();

        return redirect()->route('homepage-settings.edit')->with('success', 'Settings updated successfully.');
    }

    public function deleteImage($type)
    {
        // Ø¬ÙØ¨ Ø§ÙØ¥Ø¹Ø¯Ø§Ø¯Ø§Øª
        $settings = HomePageSetting::first();
        if (!$settings) {
            return redirect()->route('homepage-settings.edit')->with('error', 'Settings not found.');
        }

        // Ø­Ø°Ù Ø§ÙØµÙØ±Ø© Ø¨ÙØ§Ø¡Ù Ø¹ÙÙ Ø§ÙÙÙØ¹
        switch ($type) {
            case 'favicon':
                $image = $settings->favicon;
                $settings->favicon = null;
                break;
            case 'logo':
                $image = $settings->logo;
                $settings->logo = null;
                break;
            case 'header_image':
                $image = $settings->header_image;
                $settings->header_image = null;
                break;
            default:
                return redirect()->route('homepage-settings.edit')->with('error', 'Invalid image type.');
        }

        if ($image) {
            Storage::delete('public/images/' . $image);
        }

        $settings->save();

        return redirect()->route('homepage-settings.edit')->with('success', ucfirst($type) . ' deleted successfully.');
    }

    // Ø¯Ø§ÙØ© Ø¹Ø±Ø¶ Ø§ÙØµÙØ­Ø© "À propos"
    public function show()
    {
        $settings = HomePageSetting::first(); // Ø¬ÙØ¨ Ø§ÙØ¥Ø¹Ø¯Ø§Ø¯Ø§Øª
        return view('front.a-propos', compact('settings')); // Ø¹Ø±Ø¶ Ø§ÙØµÙØ­Ø© "À propos"
    }
}
