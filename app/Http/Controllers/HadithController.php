<?php
namespace App\Http\Controllers;

use App\Models\Hadith;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HadithController extends Controller
{
    public function index()
    {
        $hadithBooks = Hadith::getBooks();

        
        return view('hadits.index', ['hadithBooks' => $hadithBooks]);
    }

    public function show($slug)
    {
        $hadithBook = Hadith::getHadithsByBook($slug, request('page', 1));
        return view('hadits.show', [
            'hadithBook' => $hadithBook,
            'hadiths' => $hadithBook['items'] ?? [],
        ]);
    }
}