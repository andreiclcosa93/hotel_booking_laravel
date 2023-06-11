<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{


    public function viewBladeVideo() {

        $videos = Video::get();
        return view('admin.video_view', compact('videos'));

    }

    public function videoAdd() {

        return view('admin.video_add');

    }

    public function videoCreate(Request $request) {

        $request->validate([
            'video_id' => 'required',
        ]);

        $obj = new Video();

        $obj->video_id = $request->video_id;
        $obj->caption = $request->caption;
        $obj->save();

        return redirect()->back()->with('success', "Video is created successfull!");

    }

    public function videoEdit(Request $request, $id) {

        $video_data = Video::where('id', $id)->first();
        return view('admin.video_edit', compact('video_data'));

    }

    public function videoUpdate(Request $request, $id) {

        $request->validate([
            'video_id' => 'required',
        ]);

        $obj = Video::where('id',$id)->first();

        $obj->video_id = $request->video_id;
        $obj->caption = $request->caption;
        $obj->update();

        return redirect()->back()->with('success', "Video is updated successfull!");

    }

    public function videoDelete($id) {

        $single_data = Video::where('id',$id)->first();

        $single_data->delete();

        return redirect()->back()->with('success', "Video is deleted successfull!");

    }
}

