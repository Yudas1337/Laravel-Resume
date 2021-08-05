<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Certificates;
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
        $certificates = Certificates::all();
        $count        = $certificates->count();
        return view('admin.pages.certificates.index', compact('certificates', 'count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificatesRequest $request)
    {
        $request->validated();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CertificatesEditRequest $request, $id)
    {
        $request->validated();
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

        return redirect('admin/certificates')->with('status', 'Success edit certificate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificates = Certificates::findOrFail($id);
        Storage::disk('google')->delete($certificates->photo);
        $certificates->delete();
        return redirect('admin/certificates')->with('status', 'Success Delete certificate');
    }
}
