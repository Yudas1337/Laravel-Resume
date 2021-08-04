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
        if ($request->hasFile('photo')) {
            Storage::disk('google')->delete($config->photo);
            $foto = $request->file('photo');
            $file = $foto->getContent();
            $filename = $foto->getClientOriginalName();
            $filename = Str::random(16) . $filename;
            Storage::disk('google')->put($filename, $file);
            $listContents = Storage::disk('google')->listContents();
            $id = $this->getId($listContents, 'name', $filename);
            $config->photo = $id['path'];
        }
        $config->save();
        return redirect('admin/configs')->with('status', 'Berhasil Update Resume Configuration');
    }

    private function getId(array $array, $key, $value)
    {
        foreach ($array as $subarray) {
            if (isset($subarray[$key]) && $subarray[$key] == $value)
                return $subarray;
        }
    }
}
