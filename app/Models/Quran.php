<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class Quran
{
    public static function getAllSurahs()
    {
        $response = Http::get('https://equran.id/api/v2/surat');
        return $response->json()['data'] ?? [];
    }

    public static function getSurahDetail($id)
    {
        $response = Http::get('https://equran.id/api/v2/surat/' . $id);
        return $response->json()['data'] ?? [];
    }

    public static function getTafsir($id)
    {
        $response = Http::get('https://equran.id/api/v2/tafsir/' . $id);
        return $response->json()['data']['tafsir'] ?? [];
    }

    public static function getBismillahAyat()
    {
        $response = Http::get('https://equran.id/api/v2/surat/1');
        return $response->json()['data']['ayat'][0] ?? [];
    }
    public static function searchAyah($query)
    {
        $response = Http::get('https://muslim-api-three.vercel.app/v1/quran/ayah/find', [
            'query' => $query
        ]);

        return $response->json()['data'] ?? [];
    }
}