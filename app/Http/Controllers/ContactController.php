<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacts.create');
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
            'contactType'=>'required|in:mobile,telephone,fax',
            'phone_number'=>'required|string|unique:contacts,phone_number',
        ]);

        $contact = new Contact;
        $contact->contact_type = $request->contactType;
        $contact->phone_number = $request->phone_number;

        if($contact->save())
        {
            return redirect()->route('admin.contacts.index')->with('success','Contact Created Successfully!');
        }

        return redirect()->route('admin.contacts.index')->with('error', 'Error Occured! Try Again Later.');
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
        $contact = Contact::findOrFail($id);

        return view('admin.contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'contactType'=>'required|in:mobile,telephone,fax',
            'phone_number'=>'required|string|unique:contacts,phone_number,'.$id,
        ]);

        $contact = Contact::findOrFail($id);
        $contact->contact_type = $request->contactType;
        $contact->phone_number = $request->phone_number;

        if($contact->save())
        {
            return redirect()->route('admin.contacts.index')->with('success','Contact Updated Successfully!');
        }

        return redirect()->route('admin.contacts.index')->with('error', 'Error Occured! Try Again Later.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        if($contact->delete())
        {
            return redirect()->route('admin.contacts.index')->with('success','Contact Deleted Successfully!');
        }

        return redirect()->route('admin.contacts.index')->with('error', 'Error Occured! Try Again Later.');
    }
}
