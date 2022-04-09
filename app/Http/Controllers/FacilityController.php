<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Facility::all();

        return view('admin.facility.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.create');
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

        $imageName = 'gallery_image'.time().'.'.$request->file('image')->extension();
        $path =$request->file('image')->storeAs('public/facility', $imageName);

        $facility = new Facility;
        $facility->image = $imageName;
        $facility->status = "show";

        if($facility->save()){
            return redirect()->route('admin.facility.index')->with('success','Facility Image Uploaded Successfully!');
        }
        return redirect()->route('admin.facility.index')->with('error','Error Occured! Please Try Again Later');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = Facility::findOrFail($id);

        if($image->status == "show"){
            $image->status = "hide";
        }else{
            $image->status = "show";
        }

        if($image->save())
        {
            return redirect()->route('admin.facility.index')->with('success','Facility Image Updated Successfully!');
        }
        return redirect()->route('admin.facility.index')->with('error','Error Occured! Please Try Again Later');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Facility::find($id);

        Storage::delete('public/facility/'.$image->image);

        if($image->delete()){
            return redirect()->route('admin.facility.index')->with('success','Facility Image Deleted Successfully');
        }

        return redirect()->route('admin.facility.index')->with('error','Error Occured! Please Try Again Later');
    }
}
