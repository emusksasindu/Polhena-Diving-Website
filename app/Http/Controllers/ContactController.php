<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class contactController extends Controller
{
    public function index()
    {
        $data['contacts'] = Contact::orderBy('id', 'desc')->get();
        return view('admin.contacts', $data);
    }

    public function user_index()
    {
        $data['contacts'] = Contact::orderBy('id', 'desc')->get();
        return view('contacts.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'number' => ['required','numeric', 'min:10','max:15'],
            'subject' => ['required','string', 'max:50'],
            'body' => ['required','string', 'max:500'],
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->subject = $request->subject;
        $contact->body = $request->body;
        $contact->guests_id = $request->guests_id;
        $contact->save();
        return redirect()->route('admin.contacts')
            ->with('success', 'contact has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact  $contact)
    {
        return view('contacts.show', compact('contact'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact  $contact)
    {
        return view('contacts.edit', compact('contact'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'number' => ['required','numeric', 'min:10','max:15'],
            'subject' => ['required','string', 'max:50'],
            'body' => ['required','string', 'max:500'],
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->subject = $request->subject;
        $contact->body = $request->body;
        $contact->guests_id = $request->guests_id;
        $contact->save();
        return redirect()->route('admin.contacts')
            ->with('success', 'contact Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.

     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact  $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts')
            ->with('success', 'contact has been deleted successfully');
    }
    
}
