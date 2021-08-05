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
        $data = [
            'educations' => Educations::all(),
        ];
        return view('admin.pages.educations', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationsRequest $request)
    {
        Educations::create([
            'title' => $request->title,
            'graduate' => $request->graduate,
        ]);

        return redirect('admin/educations')->with(
            'status',
            'Success add education'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        echo 'aa';
        // Educations::find($id)->delete();

        // return redirect('admin/educations')->with(
        //     'status',
        //     'Success delete education'
        // );
    }
}
