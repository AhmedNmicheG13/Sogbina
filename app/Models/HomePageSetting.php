<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    use HasFactory;

    // ØªØ­Ø¯ÙÂØ¯ Ø¬Ø¯ÙÂÙÂ Ø§ÙÂØ¨ÙÂØ§ÙÂØ§Øª
    protected $table = 'home_page_settings';

    // ØªØ­Ø¯ÙÂØ¯ Ø§ÙÂØ­ÙÂÙÂÙÂ Ø§ÙÂÙÂØ§Ø¨ÙÂØ© ÙÂÙÂØªØ¹Ø¨Ø¦Ø©
    protected $fillable = [
        'header_title',
        'header_subtitle',
        'buton_color',
        'header_color_large',
        'text_color_menu',
        'site_text_color',
        'seo_title',
        'seo_description',
        'slug',
        'seo_slug',
        'favicon',
        'logo', // Ø§ÙÂØµÙÂØ±ÙÂ Ø§ÙÂØ­Ø§ÙÂÙÂØ©
        'header_image', // Ø£Ø¶ÙÂ ÙÂØ°Ø§ Ø§ÙÂØ³Ø·Ø± ÙÂÙÂØ¹ÙÂÙÂØ¯ Ø§ÙÂØ¬Ø¯ÙÂØ¯
        'page_title',      // إضافة الحقل الجديد
        'about_text',      // إضافة الحقل الجديد
    ];

    // ØªØ­Ø¯ÙÂØ¯ Ø§ÙÂÙÂÙÂÙÂ Ø§ÙÂØ§ÙÂØªØ±Ø§Ø¶ÙÂØ©
    protected $attributes = [
        'header_color_large' => '#000000',
        'text_color_menu' => '#FFFFFF',
        'site_text_color' => '#FFFFFF',
        'header_image' => '', // Ø§ÙÂÙÂÙÂÙÂØ© Ø§ÙÂØ§ÙÂØªØ±Ø§Ø¶ÙÂØ© ÙÂÙÂØµÙÂØ±Ø© Ø§ÙÂØ¬Ø¯ÙÂØ¯Ø©
    ];
}
