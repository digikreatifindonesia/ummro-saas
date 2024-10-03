<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function showSelection()
    {
        // Ambil semua negara dari database
        $countries = Country::all();
        return view('select_language', compact('countries'));
    }

    public function setCountryLanguage(Request $request)
    {
        // Validasi input
        $request->validate([
            'country_code' => 'required',
            'language' => 'required'
        ]);

        // Simpan pilihan ke session
        session(['country_code' => $request->country_code, 'language' => $request->language]);

        // Redirect ke halaman yang diinginkan
        return redirect()->route('index', [
            'country_code' => $request->country_code,
            'language' => $request->language
        ]);
    }

}
