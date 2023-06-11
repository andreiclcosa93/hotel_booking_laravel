<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class AdminFeatureController extends Controller
{


    public function index() {

        $features = Feature::get();
        return view('admin.feature_view', compact('features'));

    }

    public function featureAdd() {

        return view('admin.feature_add');

    }

    public function featureCreate(Request $request) {

        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
            'text' => 'required',
        ]);


        $obj = new Feature();

        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;

        $obj->save();

        return redirect()->back()->with('success', "Feature is created successfull!");

    }

    public function featureEdit($id) {

        $feature_data = Feature::where('id',$id)->first();
        return view('admin.feature_edit', compact('feature_data'));

    }

    public function featureUpdate(Request $request, $id) {

        $obj = Feature::where('id',$id)->first();

        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;

        $obj->update();

        return redirect()->back()->with('success', "Feature is updated successfull!");

    }

    public function featureDelete($id) {

        $single_data = Feature::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success', "Feature is deleted successfull!");

    }

}
