<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function autocomplete(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = Persona::select("documento")
            ->where("documento","LIKE","%{$request->str}%")
            ->get('query');
        return response()->json($data);
    }
}
