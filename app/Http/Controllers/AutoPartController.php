<?php

namespace App\Http\Controllers;

use App\Models\AutoPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AutoPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = AutoPart::all();

        return view('admin.auto-parts.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auto-parts.create');
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

        $imageName = 'auto_parts_image'.time().'.'.$request->file('image')->extension();
        $path =$request->file('image')->storeAs('public/auto-parts', $imageName);

        $gallery = new AutoPart;
        $gallery->image = $imageName;
        $gallery->status = "show";

        if($gallery->save()){
            return redirect()->route('admin.auto-parts.index')->with('success','Image Uploaded Successfully!');
        }
        return redirect()->route('admin.auto-parts.index')->with('error','Error Occured! Please Try Again Later');
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
        $image = AutoPart::findOrFail($id);

        if($image->status == "show"){
            $image->status = "hide";
        }else{
            $image->status = "show";
        }

        if($image->save())
        {
            return redirect()->route('admin.auto-parts.index')->with('success','Image Updated Successfully!');
        }
        return redirect()->route('admin.auto-parts.index')->with('error','Error Occured! Please Try Again Later');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = AutoPart::find($id);

        Storage::delete('public/auto-parts/'.$image->image);

        if($image->delete()){
            return redirect()->route('admin.auto-parts.index')->with('success','Image Deleted Successfully');
        }

        return redirect()->route('admin.auto-parts.index')->with('error','Error Occured! Please Try Again Later');
    }
}
