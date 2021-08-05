<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use App\Models\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts   = Contacts::all();
        $count      = $contacts->count();
        return view('admin.pages.contacts.index', compact('contacts', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactsRequest $request)
    {
        $request->validated();
        Contacts::create([
            'title'     => $request->title,
            'image'     => $request->image,
            'url'       => $request->url
        ]);

        return redirect('admin/contacts')->with('status', 'Add new Contacts Success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contacts::findOrFail($id);
        return view('admin.pages.contacts.edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactsRequest $request, $id)
    {
        $request->validated();
        $contacts = Contacts::findOrFail($id);
        $contacts->title = $request->title;
        $contacts->image = $request->image;
        $contacts->url   = $request->url;
        $contacts->save();

        return redirect('admin/contacts')->with('status', 'Update Contacts Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts = Contacts::findOrFail($id);
        $contacts->delete();

        return redirect('admin/contacts')->with('status', 'Delete Contacts Success');
    }
}
