<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigRequest;
use App\Models\Configs;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ConfigsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Configs::all()->first();
        return view('admin.pages.configs.index', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConfigRequest $request, $id)
    {
        $request->validated();
        $config = Configs::findOrFail($id);
        $config->header         = $request->header;
        $config->subheader      = $request->subheader;
        $config->sidebardesc    = $request->sidebardesc;
        $config->headerdesc     = $request->headerdesc;
        $config->skilldesc      = $request->skilldesc;
        $config->experiencedesc = $request->experiencedesc;
        $config->galerydesc     = $request->galerydesc;
        if ($request->hasFile('aboutphoto')) {
            Storage::disk('google')->delete($config->aboutphoto);
            $foto = $request->file('aboutphoto');
            $file = $foto->getContent();
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            Storage::disk('google')->put($filename, $file);
            $listContents = Storage::disk('google')->listContents();
            $id = getDrivePath($listContents, 'name', $filename);
            $config->aboutphoto = $id['path'];
        }
        if ($request->hasFile('sidebarphoto')) {
            Storage::disk('google')->delete($config->sidebarphoto);
            $foto = $request->file('sidebarphoto');
            $file = $foto->getContent();
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            Storage::disk('google')->put($filename, $file);
            $listContents = Storage::disk('google')->listContents();
            $id = getDrivePath($listContents, 'name', $filename);
            $config->sidebarphoto = $id['path'];
        }
        $config->save();
        return redirect('admin/configs')->with('status', 'Update Resume Configuration Succesfuly');
    }
}
