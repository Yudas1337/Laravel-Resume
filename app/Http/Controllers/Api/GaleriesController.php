<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GaleriesResource;
use App\Models\Galeries;

class GaleriesController extends Controller
{
    public function index()
    {
        $galeries = Galeries::orderBy('id', 'desc')->get();
        $json = array();
        foreach ($galeries as $g) {
            array_push($json, [
                'original'      => "https://drive.google.com/uc?export=view&id=$g->original",
                'thumbnail'     => "https://drive.google.com/uc?export=view&id=$g->thumbnail",
                'description'   => $g->description
            ]);
        }
        return GaleriesResource::collection($json);
    }
}
