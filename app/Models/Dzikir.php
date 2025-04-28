<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class Dzikir
{
    /**
     * Ambil semua dzikir.
     *
     * @return array
     */
    public static function getAll()
    {
        $response = Http::get('https://muslim-api-three.vercel.app/v1/dzikir');
        return $response->json()['data'] ?? [];
    }

    /**
     * Ambil dzikir berdasarkan tipe.
     *
     * @param string $type
     * @return array
     */
    public static function getByType($type)
    {
        $response = Http::get("https://muslim-api-three.vercel.app/v1/dzikir?type={$type}");
        return $response->json()['data'] ?? [];
    }
}