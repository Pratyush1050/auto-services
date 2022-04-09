<?php

namespace App\Http\Controllers;

use App\Mail\CustomerMessageReceived;
use App\Models\ContactUs;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactUs::all();
        
        return view('admin.contactUs.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contactUs.create');
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
            'name'=>'required|string',
            'phone'=>'required|numeric|integer',
            'email'=>'required|email:rfc',
            'message'=>'required|string',
        ]);

        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->phoneNo = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $toEmails = $this->getToEmail();
        $ccEmails = $this->getCcEmail();
        $bccEmails = $this->getBccEmail();
    
        Mail::to($toEmails)
        ->cc($ccEmails)
        ->bcc($bccEmails)
        ->send(new CustomerMessageReceived($contact));

        if($contact->save()){
            return redirect()->route('home')->with('success','Your Message Has Been Sent Successfully!');
        }
        return redirect()->route('home')->with('error','Error Occured! Please Try Again Later');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactUs::findOrFail($id);

        return view('admin.contactUs.view',compact('contact'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact =  ContactUs::findOrFail($id);

        if($contact->delete()){
            return redirect()->route('admin.contact-us.index')->with('success','Message Deleted Successfully!');
        }
        return redirect()->route('admin.contact-us.index')->with('error','Error Occured! Please Try Again Later');

    }

    private function getToEmail()
    {
        $ToEmail = Email::where('type','to')->get();
        $emails = [];
        foreach($ToEmail as $i=>$email)
        {
            $emails[$i] = $email->email;
        }

        return $emails;
    }

    private function getCcEmail()
    {
        $ToEmail = Email::where('type','cc')->get();
        $emails = [];
        foreach($ToEmail as $i=>$email)
        {
            $emails[$i] = $email->email;
        }

        return $emails;
    }

    private function getBccEmail()
    {
        $ToEmail = Email::where('type','bcc')->get();
        $emails = [];
        foreach($ToEmail as $i=>$email)
        {
            $emails[$i] = $email->email;
        }

        return $emails;
    }
}
