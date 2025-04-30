<?php

namespace App\Http\Controllers;

use App\Models\Quran;
use Illuminate\Http\Request;

class QuranController extends Controller
{
    public function index()
    {
        // Ambil semua daftar surah menggunakan model
        $surahs = Quran::getAllSurahs();

        return view('quran.index', compact('surahs'));
    }

    public function show($id)
    {
        // Ambil detail 1 surat menggunakan model
        $surah = Quran::getSurahDetail($id);

        // Ambil tafsir surat menggunakan model
        $tafsir = Quran::getTafsir($id);

        // Ambil data Surat Al-Fatihah (nomor 1) ayat ke-1 menggunakan model
        $bismillahAyat = Quran::getBismillahAyat();

        // Kirim data ke view
        return view('quran.show', compact('surah', 'tafsir', 'bismillahAyat'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Ambil kata kunci dari input pengguna
        $results = Quran::searchAyah($query); // Panggil fungsi di model

        return view('quransearch.search', compact('results', 'query')); // Kirim data ke view
    }
}