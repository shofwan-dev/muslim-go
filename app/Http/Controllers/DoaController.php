<?php

namespace App\Http\Controllers;

use App\Models\Doa;
use Illuminate\Http\Request;

class DoaController extends Controller
{
    /**
     * Tampilkan daftar semua doa atau cari berdasarkan kata kunci.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->query('search'); // Ambil parameter pencarian
        $source = $request->query('source'); // Ambil parameter sumber doa

        // Ambil doa berdasarkan sumber atau semua doa
        if ($search) {
            $doas = Doa::searchByQuery($search);
        } elseif ($source) {
            $doas = Doa::getBySource($source);
        } else {
            $doas = Doa::getAll();
        }

        return view('doa.index', compact('doas', 'search', 'source'));
    }

    /**
     * Tampilkan detail doa berdasarkan ID.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $doa = Doa::getById($id); // Ambil detail doa berdasarkan ID

        // Jika data tidak ditemukan, tampilkan halaman 404
        if (empty($doa)) {
            abort(404, 'Doa tidak ditemukan.');
        }

        return view('doa.show', compact('doa'));
    }
}