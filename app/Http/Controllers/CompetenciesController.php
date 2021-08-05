<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetenciesRequest;
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
        $skills = Competencies::all();
        $count  = Competencies::count();
        return view('admin.pages.competencies.index', compact('count', 'skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.competencies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenciesRequest $request)
    {
        $request->validated();
        Competencies::create([
            'icon'          => $request->icon,
            'title'         => $request->title,
            'description'   => $request->description
        ]);
        return redirect('admin/competencies')->with('status', 'Add new Competencies Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skills = Competencies::findOrFail($id);
        return view('admin.pages.competencies.edit', compact('skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompetenciesRequest $request, $id)
    {
        $request->validated();
        $skills = Competencies::findOrFail($id);
        $skills->icon           = $request->icon;
        $skills->title          = $request->title;
        $skills->description    = $request->description;
        $skills->save();
        return redirect('admin/competencies')->with('status', 'Update Competencies Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skills = Competencies::findOrFail($id);
        $skills->delete();
        return redirect('admin/competencies')->with('status', 'Delete Competencies Success');
    }
}
