<?php
namespace App\Models;

use Illuminate\Support\Facades\Http;

class Hadith
{
    private static $apiBaseUrl = 'https://islamic-api.vwxyz.id/hadits';

    /**
     * Mendapatkan daftar kitab hadits.
     *
     * @return array
     */
    public static function getBooks()
    {
        $response = Http::get(self::$apiBaseUrl);
        return $response->json()['data'] ?? [];
    }

    /**
     * Mendapatkan isi kitab hadits berdasarkan slug.
     *
     * @param string $slug
     * @param int $page
     * @param int $limit
     * @return array
     */
    public static function getHadithsByBook($slug, $page = 1, $limit = 20)
    {
        $response = Http::get(self::$apiBaseUrl . "/{$slug}", [
            'page' => $page,
            'limit' => $limit,
        ]);
        return $response->json()['data'] ?? [];
    }


}