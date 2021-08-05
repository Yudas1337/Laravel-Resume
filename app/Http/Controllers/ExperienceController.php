<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;
use App\Models\Experiences;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experiences::orderBy('id', 'desc')->get();
        $count       = Experiences::count();
        return view('admin.pages.experiences.index', compact('experiences', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceRequest $request)
    {
        $request->validated();
        Experiences::create([
            'title'         => $request->title,
            'location'      => $request->location,
            'description'   => $request->description,
            'position'      => $request->position,
            'date'          => $request->date
        ]);
        return redirect('admin/experiences')->with('status', 'Add new Experiences Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiences = Experiences::findOrFail($id);
        return view('admin.pages.experiences.edit', compact('experiences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceRequest $request, $id)
    {
        $request->validated();
        $experiences = Experiences::findOrFail($id);
        $experiences->title         = $request->title;
        $experiences->location      = $request->location;
        $experiences->description   = $request->description;
        $experiences->position      = $request->position;
        $experiences->date          = $request->date;
        $experiences->save();
        return redirect('admin/experiences')->with('status', 'Update Experiences Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiences = Experiences::findOrFail($id);
        $experiences->delete();
        return redirect('admin/experiences')->with('status', 'Delete Experiences Success');
    }
}
