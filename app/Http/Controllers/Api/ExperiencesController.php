<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExperiencesResource;
use App\Models\Experiences;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experiences::orderBy('id', 'desc')->get();
        return ExperiencesResource::collection($experiences);
    }
}
