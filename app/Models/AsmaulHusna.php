<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class AsmaulHusna
{
    /**
     * Ambil semua data Asmaul Husna.
     *
     * @return array
     */
    public static function getAll()
    {
        $response = Http::get('https://muslim-api-three.vercel.app/v1/quran/asma');
        return $response->json()['data'] ?? [];
    }
}