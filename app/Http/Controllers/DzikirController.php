<?php

namespace App\Http\Controllers;

use App\Models\Dzikir;
use Illuminate\Http\Request;

class DzikirController extends Controller
{
    /**
     * Tampilkan daftar dzikir berdasarkan tipe atau semua dzikir.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $type = $request->query('type'); // Ambil parameter tipe dzikir (pagi, sore, solat)

        // Ambil data dzikir dari model
        if ($type) {
            $dzikirs = Dzikir::getByType($type);
        } else {
            $dzikirs = Dzikir::getAll();
        }

        return view('dzikir.index', compact('dzikirs', 'type'));
    }
}