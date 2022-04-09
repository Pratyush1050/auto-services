<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::all();
        return view('admin.emails.index',compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.emails.create');
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
            'type'=>'required|in:to,cc,bcc',
            'email'=>'required|unique:emails,email|email:rfc'
        ]);

        $email = new Email;
        $email->fill([
            'type'=>$request->type,
            'email'=>$request->email
        ]);

        if($email->save())
        {
            return redirect()->route('admin.emails.index')->with('success','Email Created Successfully!');
        }

        return redirect()->route('admin.emails.index')->with('error','Error Occured! Try Again Later');
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
        $email = Email::findOrFail($id);

        return view('admin.emails.edit',compact('email'));
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
            'type'=>'required|in:to,cc,bcc',
            'email'=>'required|email:rfc|unique:emails,email,'.$id,
        ]);

        $email = Email::findOrFail($id);

        $email->fill([
            'type'=>$request->type,
            'email'=>$request->email
        ]);

        if($email->save())
        {
            return redirect()->route('admin.emails.index')->with('success','Email Updated Successfully!');
        }

        return redirect()->route('admin.emails.index')->with('error','Error Occured! Try Again Later');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Email::findOrFail($id);

        if($email->delete())
        {
            return redirect()->route('admin.emails.index')->with('success','Email Deleted Successfully!'); 
        }

        return redirect()->route('admin.emails.index')->with('error','Error Occured. Try Again Later!');
    }
}
