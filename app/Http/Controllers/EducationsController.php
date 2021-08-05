<?php

namespace App\Http\Controllers;

use App\Models\Educations;
use Illuminate\Http\Request;
use App\Http\Requests\EducationsRequest;

class EducationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Educations::all();
        $count      = $educations->count();
        return view('admin.pages.educations.index', compact('educations', 'count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationsRequest $request)
    {
        $request->validated();
        Educations::create([
            'title'    => $request->title,
            'graduate' => $request->graduate,
        ]);
        return redirect('admin/educations')->with('status', 'Success add education');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationsRequest $request, $id)
    {
        Educations::find($id)->update($request->all());

        return redirect('admin/educations')->with(
            'status',
            'Success edit education'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $educations = Educations::findOrFail($id);
        $educations->delete();
        return redirect('admin/educations')->with('status', 'Success delete education');
    }
}
