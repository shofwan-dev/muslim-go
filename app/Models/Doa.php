<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class Doa
{
    public static function getAll()
    {
        $response = Http::get('https://open-api.my.id/api/doa');
        return $response->json();
    }

    public static function getById($id)
    {
        $response = Http::get("https://open-api.my.id/api/doa/{$id}");
        return $response->json();
    }
}