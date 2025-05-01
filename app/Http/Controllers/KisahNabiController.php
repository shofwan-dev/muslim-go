<?php

namespace App\Http\Controllers;

use App\Models\KisahNabi;
use Illuminate\Http\Request;

class KisahNabiController extends Controller
{
    public function index()
    {
        // Ambil semua kisah nabi menggunakan model
        $kisahNabi = KisahNabi::getAll();

        return view('kisahnabi.index', compact('kisahNabi'));
    }
}
