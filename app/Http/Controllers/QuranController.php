<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class QuranController extends Controller
{
    public function index()
    {
        // Ambil semua daftar surah
        $response = Http::get('https://equran.id/api/v2/surat');
        $surahs = $response->json()['data'] ?? [];

        return view('quran.index', compact('surahs'));
    }

    public function show($id)
    {
        // Ambil detail 1 surat
        $response = Http::get('https://equran.id/api/v2/surat/' . $id);
        $surah = $response->json()['data'] ?? [];

        // Ambil tafsir surat
        $tafsirResponse = Http::get('https://equran.id/api/v2/tafsir/' . $id);
        $tafsir = $tafsirResponse->json()['data']['tafsir'] ?? [];

        return view('quran.show', compact('surah', 'tafsir'));
    }
}
