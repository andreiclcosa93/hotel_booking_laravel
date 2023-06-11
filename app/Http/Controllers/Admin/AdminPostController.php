<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{

    public function viewBladePost() {

        $posts = Post::get();
        return view('admin.post_view', compact('posts'));

    }

    public function postAdd() {

        return view('admin.post_add');

    }

    public function postCreate(Request $request) {

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required',
            // 'total_view' => 'required',
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        // $admin_data->photo = $final_name;

        $obj = new Post();

        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = 1;
        $obj->save();

        return redirect()->back()->with('success', "Post is created successfull!");

    }

    public function postEdit($id) {

        $slide_data = Post::where('id',$id)->first();
        return view('admin.post_edit', compact('slide_data'));

    }


    public function postUpdate(Request $request, $id) {

        $obj = Post::where('id',$id)->first();

        if($request->hasFile('photo')) {

            $request->validate([
                'heading' => 'required',
                'short_content' => 'required',
                'content' => 'required',
            ]);

            unlink(public_path('uploads/'.$obj->photo));
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);
            $obj->photo = $final_name;
        }


        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = $request->total_view;
        $obj->update();

        return redirect()->back()->with('success', "Post is updated successfull!");

    }

    public function postDelete($id) {

        $single_data = Post::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();

        return redirect()->back()->with('success', "Post is deleted successfull!");

    }

}
