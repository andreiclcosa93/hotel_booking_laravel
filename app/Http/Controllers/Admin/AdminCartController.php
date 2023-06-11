<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class AdminCartController extends Controller
{


    public function cart() {

        $page_data = Cart::where('id', 1)->first();
        return view('admin.page_card', compact('page_data'));

    }

    public function cart_update(Request $request) {

        $obj = Cart::where('id', 1)->first();

        $obj->cart_heading = $request->cart_heading;
        $obj->cart_status = $request->cart_status;
        $obj->update();

        return redirect()->back()->with('success', "Data is updated successfull!");

    }

    ######################################################################################

    public function checkout() {

        $page_data = Cart::where('id', 1)->first();
        return view('admin.page_checkout', compact('page_data'));

    }

    public function checkout_update(Request $request) {

        $obj = Cart::where('id', 1)->first();

        $obj->checkout_heading = $request->checkout_heading;
        $obj->checkout_status = $request->checkout_status;
        $obj->update();

        return redirect()->back()->with('success', "Data is updated successfull!");

    }

    #########################################################################################

    public function payment() {

        $page_data = Cart::where('id', 1)->first();
        return view('admin.page_payment', compact('page_data'));

    }

    public function payment_update(Request $request) {

        $obj = Cart::where('id', 1)->first();

        $obj->payment_heading = $request->payment_heading;
        $obj->update();

        return redirect()->back()->with('success', "Data is updated successfull!");

    }

}
