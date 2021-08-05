<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfoliosRequest;
use App\Models\Portfolios;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $count = Portfolios::count();
        return view('admin.pages.portfolios.index', compact('portfolios', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfoliosRequest $request)
    {
        $request->validated();
        if (!$request->hasFile('photo')) {
            return back()->withErrors('Photo is required');
        }
        $foto = $request->file('photo');
        $file = $foto->getContent();
        $filename = $foto->getClientOriginalName();
        $filename = Str::random(16) . $filename;
        Storage::disk('google')->put($filename, $file);
        $listContents = Storage::disk('google')->listContents();
        $id = getDrivePath($listContents, 'name', $filename);
        Portfolios::create([
            'title'             => $request->title,
            'description'       => $request->description,
            'photo'             => $id['path'],
            'category'          => $request->category,
            'isPrivate'         => $request->isPrivate,
            'technology'        => $request->technology,
            'download'          => $request->download
        ]);
        return redirect('admin/portfolios')->with('status', 'Add new Portfolios Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolios = Portfolios::findOrFail($id);
        return view('admin.pages.portfolios.edit', compact('portfolios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfoliosRequest $request, $id)
    {
        $request->validated();
        $portfolios = Portfolios::findOrFail($id);
        $portfolios->title       = $request->title;
        $portfolios->description = $request->description;
        $portfolios->category    = $request->category;
        $portfolios->isPrivate   = $request->isPrivate;
        $portfolios->technology  = $request->technology;
        $portfolios->download    = $request->download;
        if ($request->hasFile('photo')) {
            Storage::disk('google')->delete($portfolios->photo);
            $foto = $request->file('photo');
            $file = $foto->getContent();
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            Storage::disk('google')->put($filename, $file);
            $listContents = Storage::disk('google')->listContents();
            $id = getDrivePath($listContents, 'name', $filename);
            $portfolios->photo = $id['path'];
        }
        $portfolios->save();
        return redirect('admin/portfolios')->with('status', 'Update Portfolios Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolios = Portfolios::findOrFail($id);
        Storage::disk('google')->delete($portfolios->photo);
        $portfolios->delete();
        return redirect('admin/portfolios')->with('status', 'Delete Portfolios Success');
    }
}
