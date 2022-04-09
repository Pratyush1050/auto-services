<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::all();
        return view('admin.gallery.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
        $path =$request->file('image')->storeAs('public/gallery', $imageName);

        $gallery = new Gallery;
        $gallery->image = $imageName;
        $gallery->status = "show";

        if($gallery->save()){
            return redirect()->route('admin.gallery.index')->with('success','Gallery Image Uploaded Successfully!');
        }
        return redirect()->route('admin.gallery.index')->with('error','Error Occured! Please Try Again Later');

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
        $image = Gallery::findOrFail($id);

        if($image->status == "show"){
            $image->status = "hide";
        }else{
            $image->status = "show";
        }

        if($image->save())
        {
            return redirect()->route('admin.gallery.index')->with('success','Gallery Image Updated Successfully!');
        }
        return redirect()->route('admin.gallery.index')->with('error','Error Occured! Please Try Again Later');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::find($id);

        Storage::delete('public/gallery/'.$image->image);

        if($image->delete()){
            return redirect()->route('admin.gallery.index')->with('success','Gallery Image Deleted Successfully');
        }

        return redirect()->route('admin.gallery.index')->with('error','Error Occured! Please Try Again Later');
    }
}
