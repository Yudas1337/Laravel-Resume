<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('admin.pages.updatepass');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordRequest $request)
    {
        $request->validated();
        $user = User::findorfail(auth()->id());

        if (Hash::check($request->oldPass, $user->password)) {
            if (!Hash::check($request->newPass, $user->password)) {
                $user->password = Hash::make($request->newPass);
                $user->save();
                return redirect('admin/password')->with('status', 'Berhasil update password!');
            } else {
                return back()->withErrors([
                    'Password baru tidak boleh sama dengan password lama'
                ]);
            }
        } else {
            return back()->withErrors([
                'Password lama tidak cocok'
            ]);
        }
    }
}
