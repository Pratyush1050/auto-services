<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
            'description'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg|max:500'
        ]);
        //handle image
        $imageName = 'service_image'.time().'.'.$request->file('image')->extension();
        $path = $request->file('image')->storeAs('public/service',$imageName);

        $service = new Service;
        $service->description = $request->description;
        $service->image = $imageName;

        if($service->save()){
            return redirect()->route('admin.services.index')->with('success','Service Created Successfully');
        }

        return redirect()->route('admin.services.index')->with('error','Error Occured! Please Try Again Later');
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
        $service = Service::findOrFail($id);

        return view('admin.services.edit',compact('service'));
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
            'description'=>'string|required'
        ]);

        $service = Service::findOrFail($id);
        $service->description = $request->description;

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg|max:500'
            ]);
            //delete previous file
            Storage::delete('public/service/'.$service->image);
            //handle new image
            $imageName = 'service_image'.time().'.'.$request->file('image')->extension();
            $path = $request->file('image')->storeAs('public/service',$imageName);

            $service->image = $imageName;
        }

        if($service->save())
        {
            return redirect()->route('admin.services.index')->with('success','Service Updated Successfully');
        }

        return redirect()->route('admin.services.index')->with('error','Error Occured! Please Try Again Later');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        Storage::delete('public/service/'.$service->image);

        if($service->delete()){
            return redirect()->route('admin.services.index')->with('success','Service Deleted Successfully');
        }

        return redirect()->route('admin.services.index')->with('error','Error Occured! Please Try Again Later');
    }
}
