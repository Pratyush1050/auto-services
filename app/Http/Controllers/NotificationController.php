<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::all();

        return view('admin.notifications.index',compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notifications.create');
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
            'notificationType' => 'required|in:notification,banner',
            'image'=>'required|mimes:png,jpg,jpeg|max:500',
            'title'=>'required_if:notificationType,==,notification|string|nullable',
            'description'=>'required_if:notificationType,==,notification|string|nullable'
        ]);


        $imageName = 'notification_image'.time().'.'.$request->file('image')->extension();
        $path =$request->file('image')->storeAs('public/notification', $imageName);

        $notification = new Notification;
        $notification->image = $imageName;
        $notification->status = "show";
        $notification->type = $request->notificationType;
        $notification->title = $request->title;
        $notification->description = $request->description;

        if($notification->save()){
            return redirect()->route('admin.notifications.index')->with('success','Notification Image Uploaded Successfully!');
        }
        return redirect()->route('admin.notifications.index')->with('error','Error Occured! Please Try Again Later');
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
        $notification = Notification::findOrFail($id);

        if($notification->status == "show"){
            $notification->status = "hide";
        }else{
            $notification->status = "show";
        }

        if($notification->save())
        {
            return redirect()->route('admin.notifications.index')->with('success','Notification Image Updated Successfully!');
        }
        return redirect()->route('admin.notifications.index')->with('error','Error Occured! Please Try Again Later');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);

        Storage::delete('public/gallery/'.$notification->image);

        if($notification->delete()){
            return redirect()->route('admin.notifications.index')->with('success','Notification Image Deleted Successfully');
        }

        return redirect()->route('admin.notifications.index')->with('error','Error Occured! Please Try Again Later');
    }
}
