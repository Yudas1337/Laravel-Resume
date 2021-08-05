<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PortfoliosResource;
use App\Models\Portfolios;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolios::orderBy('id', 'desc')->get();
        return PortfoliosResource::collection($portfolios);
    }
}
