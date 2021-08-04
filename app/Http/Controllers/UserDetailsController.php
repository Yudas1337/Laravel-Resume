<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = UserDetails::all()->first();
        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $request->validated();
        $profiles = UserDetails::findOrFail($id);
        $profiles->name         = $request->name;
        $profiles->linkedin     = $request->linkedin;
        $profiles->gmail        = $request->gmail;
        $profiles->telegram     = $request->telegram;
        $profiles->github       = $request->github;
        $profiles->whatsapp     = $request->whatsapp;
        $profiles->instagram    = $request->instagram;
        $profiles->facebook     = $request->facebook;

        if ($request->hasFile('photo')) {
            Storage::disk('google')->delete($profiles->photo);
            $foto = $request->file('photo');
            $file = $foto->getContent();
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            Storage::disk('google')->put($filename, $file);
            $listContents = Storage::disk('google')->listContents();
            $id = getDrivePath($listContents, 'name', $filename);
            $profiles->photo = $id['path'];
        }
        $profiles->save();
        return redirect('admin/profiles')->with('status', 'Update Profiles Successfuly');
    }
}
