<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Available languages
     */
    public static array $languages = [
        'en' => ['name' => 'English', 'native' => 'English', 'flag' => '🇬🇧'],
        'fr' => ['name' => 'French', 'native' => 'Français', 'flag' => '🇫🇷'],
        'rw' => ['name' => 'Kinyarwanda', 'native' => 'Ikinyarwanda', 'flag' => '🇷🇼'],
        'sw' => ['name' => 'Swahili', 'native' => 'Kiswahili', 'flag' => '🇹🇿'],
    ];

    /**
     * Switch the application language
     */
    public function switch(Request $request, string $locale)
    {
        if (array_key_exists($locale, self::$languages)) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return redirect()->back();
    }

    /**
     * Get the list of available languages
     */
    public static function getLanguages(): array
    {
        return self::$languages;
    }

    /**
     * Get current language info
     */
    public static function getCurrentLanguage(): array
    {
        $locale = Session::get('locale', config('app.locale', 'en'));
        return self::$languages[$locale] ?? self::$languages['en'];
    }
}
