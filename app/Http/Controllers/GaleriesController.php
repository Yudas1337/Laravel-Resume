<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriesRequest;
use App\Models\Galeries;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeries = Galeries::orderBy('id', 'desc')->get();
        $count = $galeries->count();
        return view('admin.pages.galeries.index', compact('galeries', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.galeries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GaleriesRequest $request)
    {
        $request->validated();
        if (!$request->hasFile('original')) {
            return back()->withErrors('Photo is Required');
        }
        $foto = $request->file('original');
        $file = $foto->getContent();
        $filename = $foto->getClientOriginalName();
        $filename = Str::random(16) . $filename;
        Storage::disk('google')->put($filename, $file);
        $listContents = Storage::disk('google')->listContents();
        $id = getDrivePath($listContents, 'name', $filename);
        Galeries::create([
            'original'      => $id['path'],
            'thumbnail'     => $id['path'],
            'description'   => $request->description
        ]);
        return redirect('admin/galeries')->with('status', 'Add New Galeries Successfuly');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeries = Galeries::findOrFail($id);
        return view('admin.pages.galeries.edit', compact('galeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GaleriesRequest $request, $id)
    {
        $request->validated();
        $galeries = Galeries::findOrFail($id);

        if ($request->hasFile('original')) {
            Storage::disk('google')->delete($galeries->photo);
            $foto = $request->file('original');
            $file = $foto->getContent();
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            Storage::disk('google')->put($filename, $file);
            $listContents = Storage::disk('google')->listContents();
            $id = getDrivePath($listContents, 'name', $filename);
            $galeries->original = $id['path'];
            $galeries->thumbnail = $id['path'];
        }
        $galeries->description = $request->description;
        $galeries->save();
        return redirect('admin/galeries')->with('status', 'Update Galeries Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeries = Galeries::findOrFail($id);
        Storage::disk('google')->delete($galeries->photo);
        $galeries->delete();
        return redirect('admin/galeries')->with('status', 'Delete Galeries Successfuly');
    }
}
