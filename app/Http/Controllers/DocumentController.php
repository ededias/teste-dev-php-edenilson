<?php

namespace App\Http\Controllers;

use App\Rules\DocumentRule;
use App\Service\DocumentBrazilService;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct(protected DocumentBrazilService $service)
    {
        
    }

    public function find(Request $request, $document)
    {
        $validator = validator($request->route()->parameters(), [
            'document' => [
                new DocumentRule
            ]
        ]);
        if ($validator->fails()) return response()->json(['errors' => $validator->errors()]);

        return response()->json($this->service->get($document));
    }

}
