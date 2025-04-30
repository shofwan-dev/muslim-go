<?php
    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Http;
    use App\Models\Tahlil;

    class TahlilController extends Controller
    {
        /**
         * Tampilkan semua tahlil.
         *
         * @return \Illuminate\View\View
         */
        public function index()
        {
            $tahlil = Tahlil::getAll();
            return view('tahlil.index', compact('tahlil'));
        }
    }