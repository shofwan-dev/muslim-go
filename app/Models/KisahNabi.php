<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class KisahNabi
{
    public static function getAll()
    {
        $response = Http::get('https://islamic-api.vwxyz.id/kisahnabi');
        return $response->json()['data'] ?? [];
    }
}
