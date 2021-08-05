<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Certificates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CertificatesRequest;
use App\Http\Requests\CertificatesEditRequest;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'certificates' => Certificates::all(),
        ];

        return view('admin.pages.certificates', $data);
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
    public function store(CertificatesRequest $request)
    {
        if ($request->hasFile('photo')) {
            $foto = $request->file('photo');
            $file = $foto->getContent();
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            Storage::disk('google')->put($filename, $file);
            $listContents = Storage::disk('google')->listContents();
            $id = getDrivePath($listContents, 'name', $filename);

            Certificates::create([
                'title' => $request->title,
                'photo' => $id['path'],
                'description' => $request->description,
            ]);
        }

        return redirect('admin/certificates')->with(
            'status',
            'Success add certificate'
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
    public function update(CertificatesEditRequest $request, $id)
    {
        $certificate = Certificates::findOrFail($id);
        $certificate->title = $request->title;
        $certificate->description = $request->description;
        if ($request->hasFile('photo')) {
            Storage::disk('google')->delete($certificate->photo);
            $foto = $request->file('photo');
            $file = $foto->getContent();
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            Storage::disk('google')->put($filename, $file);
            $listContents = Storage::disk('google')->listContents();
            $id = getDrivePath($listContents, 'name', $filename);
            $certificate->photo = $id['path'];
        }
        $certificate->save();

        return redirect('admin/certificates')->with(
            'status',
            'Success edit certificate'
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
        //
    }
}
