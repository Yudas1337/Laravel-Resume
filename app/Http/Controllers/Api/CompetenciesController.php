<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetenciesResource;
use App\Models\Competencies;
use Illuminate\Http\Request;

class CompetenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencies = Competencies::all();
        return CompetenciesResource::collection($competencies);
    }
}
