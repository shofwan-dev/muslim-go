<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class Doa
{
    /**
     * Ambil semua doa.
     *
     * @return array
     */
    public static function getAll()
    {
        $response = Http::get('https://muslim-api-three.vercel.app/v1/doa');
        return $response->json()['data'] ?? [];
    }

    /**
     * Ambil doa berdasarkan sumber.
     *
     * @param string $source
     * @return array
     */
    public static function getBySource($source)
    {
        $response = Http::get("https://muslim-api-three.vercel.app/v1/doa?source={$source}");
        return $response->json()['data'] ?? [];
    }

    /**
     * Cari doa berdasarkan judul atau kata kunci.
     *
     * @param string $query
     * @return array
     */
    public static function searchByQuery($query)
    {
        $response = Http::get("https://muslim-api-three.vercel.app/v1/doa/find?query={$query}");
        return $response->json()['data'] ?? [];
    }

    /**
     * Ambil detail doa berdasarkan ID.
     *
     * @param string $id
     * @return array
     */
    public static function getById($id)
    {
        $response = Http::get("https://muslim-api-three.vercel.app/v1/doa/{$id}");
        return $response->json()['data'] ?? [];
    }
}