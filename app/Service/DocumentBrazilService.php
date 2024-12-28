<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DocumentBrazilService 
{
    public function get($document)
    {
        try {
            $response = Http::get("https://brasilapi.com.br/api/cnpj/v1/{$document}");
            if ($response->status() == 404) return null;
            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getFile() . ':' . $e->getLine());
            Log::error($e->getMessage());
            return null;
        }
    }
}