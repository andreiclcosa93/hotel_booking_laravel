<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forgot;

class AdminForgotController extends Controller
{

    public function forget_password() {

        $page_data = Forgot::where('id',1)->first();
        return view('admin.page_forget_password', compact('page_data'));

    }

    public function forget_password_update(Request $request) {

        $request->validate([
            'forget_password_heading' => 'required|email',
        ]);

        $obj = Forgot::where('id',1)->first();
        $obj->forget_password_heading = $request->forget_password_heading;
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }

    public function reset_password() {

        $page_data = Forgot::where('id',1)->first();
        return view('admin.page_reset_password', compact('page_data'));

    }

    public function reset_password_update(Request $request) {

        $request->validate([
            'reset_password_heading' => 'required|email',
        ]);

        $obj = Forgot::where('id',1)->first();
        $obj->reset_password_heading = $request->reset_password_heading;
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }

}
