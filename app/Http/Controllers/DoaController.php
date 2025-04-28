<?php

namespace App\Http\Controllers;

use App\Models\Doa;
use Illuminate\Http\Request;

class DoaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $doas = Doa::getAll();

        if ($search) {
            $doas = array_filter($doas, function ($doa) use ($search) {
                return stripos($doa['judul'], $search) !== false;
            });
        }

        return view('doa.index', compact('doas', 'search'));
    }

    public function show($id)
    {
        $doa = Doa::getById($id);
        return view('doa.show', compact('doa'));
    }
}