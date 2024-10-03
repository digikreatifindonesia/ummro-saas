<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCountryLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah country_code dan language sudah ada di session
        // Periksa apakah country_code dan language sudah ada di session
        if (!session()->has('country_code') || !session()->has('language')) {
            // Redirect ke halaman pemilihan bahasa dan negara
            return redirect()->route('language.selection'); // Pastikan rute ini benar
        }

        return $next($request);
    }
}
