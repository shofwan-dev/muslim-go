<?php

namespace App\Http\Controllers;

use App\Models\AsmaulHusna;

class AsmaulHusnaController extends Controller
{
    /**
     * Tampilkan daftar Asmaul Husna.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $asmaulHusna = AsmaulHusna::getAll();
        return view('asmaulhusna.index', compact('asmaulHusna'));
    }
}