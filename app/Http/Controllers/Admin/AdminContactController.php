<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{

    public function contact() {

        $page_data = Contact::where('id', 1)->first();
        return view('admin.page_contact', compact('page_data'));

    }

    public function contact_update(Request $request) {

        $request->validate([
            'contact_heading' => 'required',
            'contact_map' => 'required'
        ]);

        $obj = Contact::where('id', 1)->first();

        $obj->contact_heading = $request->contact_heading;
        $obj->contact_map = $request->contact_map;
        $obj->contact_status = $request->contact_status;
        $obj->update();

        return redirect()->back()->with('success', "Data is updated successfull!");

    }

}
