<?php
    namespace App\Models;
    use Illuminate\Support\Facades\Http;

    class Tahlil
    {
        /**
         * Ambil semua tahlil.
         *
         * @return array
         */
        public static function getAll()
        {
            $response = Http::get('https://islamic-api.vwxyz.id/tahlil');
            return $response->json()['data'] ?? [];
        }
    }