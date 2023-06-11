<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;

class AdminAmenityController extends Controller
{

    public function show() {

        $amenities = Amenity::get();
        return view('admin.amenity_view', compact('amenities'));

    }

    public function amenityAdd() {

        return view('admin.amenity_add');

    }

    public function amenityCreate(Request $request) {

        $request->validate([
            'name' => 'required',
        ]);

        $obj = new Amenity();

        $obj->name = $request->name;

        $obj->save();

        return redirect()->back()->with('success', "Amenity is created successfull!");

    }

    public function amenityEdit(Request $request, $id) {

        $amenity_data = Amenity::where('id', $id)->first();
        return view('admin.amenity_edit', compact('amenity_data'));

    }

    public function amenityUpdate(Request $request, $id) {

        $request->validate([
            'name' => 'required',
        ]);

        $obj = Amenity::where('id',$id)->first();

        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success', "Amenity is updated successfull!");

    }

    public function amenityDelete($id) {

        $amenity_data = Amenity::where('id',$id)->first();

        $amenity_data->delete();

        return redirect()->back()->with('success', "Faq is deleted successfull!");

    }

}
