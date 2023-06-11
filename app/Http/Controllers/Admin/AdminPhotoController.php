<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class AdminPhotoController extends Controller
{

    public function viewBladePhoto() {

        $photos = Photo::get();
        return view('admin.photo_view', compact('photos'));

    }

    public function photoAdd() {

        return view('admin.photo_add');

    }

    public function photoCreate(Request $request) {

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        // $admin_data->photo = $final_name;

        $obj = new Photo();

        $obj->photo = $final_name;
        $obj->caption = $request->caption;
        $obj->save();

        return redirect()->back()->with('success', "Photo is created successfull!");

    }

    public function photoEdit($id) {

        $photo_data = Photo::where('id',$id)->first();
        return view('admin.photo_edit', compact('photo_data'));

    }

    public function photoUpdate(Request $request, $id) {

        $obj = Photo::where('id',$id)->first();

        if($request->hasFile('photo')) {

            $request->validate([
                'caption' => 'required',
            ]);

            unlink(public_path('uploads/'.$obj->photo));
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $obj->photo = $final_name;
        }


        $obj->caption = $request->caption;
        $obj->update();

        return redirect()->back()->with('success', "Photo is updated successfull!");

    }


    public function photoDelete($id) {

        $single_data = Photo::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success', "Photo is deleted successfull!");

    }

}
