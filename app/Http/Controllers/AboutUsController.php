<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = AboutUs::all();

        return view('admin.aboutUs.index',compact('aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutUs.create');
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
        $imageName = 'aboutUs_image'.time().'.'.$request->file('image')->extension();
        $path = $request->file('image')->storeAs('public/aboutUs',$imageName);

        $aboutUs = new AboutUs;
        $aboutUs->description = $request->description;
        $aboutUs->image = $imageName;

        if($aboutUs->save()){
            return redirect()->route('admin.about-us.index')->with('success','About Us Created Successfully');
        }

        return redirect()->route('admin.about-us.index')->with('error','Error Occured! Please Try Again Later');
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
        $aboutUs = AboutUs::findOrFail($id);

        return view('admin.aboutUs.edit',compact('aboutUs'));
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

        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->description = $request->description;

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg|max:500'
            ]);
            //delete previous file
            Storage::delete('public/aboutUs/'.$aboutUs->image);
            //handle new image
            $imageName = 'aboutUs_image'.time().'.'.$request->file('image')->extension();
            $path = $request->file('image')->storeAs('public/aboutUs',$imageName);

            $aboutUs->image = $imageName;
        }

        if($aboutUs->save())
        {
            return redirect()->route('admin.about-us.index')->with('success','About Us Updated Successfully');
        }

        return redirect()->route('admin.about-us.index')->with('error','Error Occured! Please Try Again Later');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        Storage::delete('public/aboutUs/'.$aboutUs->image);

        if($aboutUs->delete()){
            return redirect()->route('admin.about-us.index')->with('success','About Us Deleted Successfully');
        }

        return redirect()->route('admin.about-us.index')->with('error','Error Occured! Please Try Again Later');
    }
}
