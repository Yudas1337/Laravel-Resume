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
        return GaleriesResource::collection(($galeries));
    }
}
