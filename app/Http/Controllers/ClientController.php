<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
            'image'=>'required|mimes:png,jpg,jpeg|max:500',
        ]);

        $imageName = 'client_image'.time().'.'.$request->file('image')->extension();
        $path =$request->file('image')->storeAs('public/client', $imageName);

        $client = new Client;
        $client->image = $imageName;
        $client->status = "show";

        if($client->save()){
            return redirect()->route('admin.clients.index')->with('success','Client Image Uploaded Successfully!');
        }
        return redirect()->route('admin.clients.index')->with('error','Error Occured! Please Try Again Later');
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
        $client = Client::findOrFail($id);

        if($client->status == "show"){
            $client->status = "hide";
        }else{
            $client->status = "show";
        }

        if($client->save())
        {
            return redirect()->route('admin.clients.index')->with('success','Client Image Updated Successfully!');
        }
        return redirect()->route('admin.clients.index')->with('error','Error Occured! Please Try Again Later');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);

        Storage::delete('public/client/'.$client->image);

        if($client->delete()){
            return redirect()->route('admin.clients.index')->with('success','Client Image Deleted Successfully');
        }

        return redirect()->route('admin.clients.index')->with('error','Error Occured! Please Try Again Later');
    }
}
