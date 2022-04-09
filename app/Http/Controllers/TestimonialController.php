<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
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
            'description'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg|max:500'
        ]);
        //handle image
        $imageName = Str::camel($request->name).'_'.time().'.'.$request->file('image')->extension();
        $path = $request->file('image')->storeAs('public/testimonial',$imageName);

        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->image = $imageName;

        if($testimonial->save()){
            return redirect()->route('admin.testimonials.index')->with('success','Notification Image Created Successfully');
        }

        return redirect()->route('admin.testimonials.index')->with('error','Error Occured! Please Try Again Later');

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
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.edit',compact('testimonial'));
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
            'name'=>'string|required',
            'description'=>'string|required'
        ]);

        $testimonial= Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->description = $request->description;

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg|max:500'
            ]);
            //delete previous file
            Storage::delete('public/testimonials/'.$testimonial->image);
            //handle new image
            $imageName = Str::camel($request->name).'_'.time().'.'.$request->file('image')->extension();
            $path = $request->file('image')->storeAs('public/testimonial',$imageName);

            $testimonial->image = $imageName;
        }

        if($testimonial->save())
        {
            return redirect()->route('admin.testimonials.index')->with('success','Testimonial Updated Successfully');
        }

        return redirect()->route('admin.testimonials.index')->with('error','Error Occured! Please Try Again Later');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        Storage::delete('public/testimonials/'.$testimonial->image);

        if($testimonial->delete()){
            return redirect()->route('admin.testimonials.index')->with('success','Testimonial Deleted Successfully');
        }

        return redirect()->route('admin.testimonials.index')->with('error','Error Occured! Please Try Again Later');
    }
}
