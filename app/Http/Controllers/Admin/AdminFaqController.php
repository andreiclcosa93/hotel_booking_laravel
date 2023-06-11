<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{

    public function viewBladeFaq() {

        $faqs = Faq::get();
        return view('admin.faq_view', compact('faqs'));

    }

    public function faqAdd() {

        return view('admin.faq_add');

    }

    public function faqCreate(Request $request) {

        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $obj = new Faq();

        $obj->question = $request->question;
        $obj->answer = $request->answer;

        $obj->save();

        return redirect()->back()->with('success', "Faq is created successfull!");

    }

    public function faqEdit(Request $request, $id) {

        $faq_data = Faq::where('id', $id)->first();
        return view('admin.faq_edit', compact('faq_data'));

    }

    public function faqUpdate(Request $request, $id) {

        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $obj = Faq::where('id',$id)->first();

        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->update();

        return redirect()->back()->with('success', "Faq is updated successfull!");

    }

    public function faqDelete($id) {

        $single_data = Faq::where('id',$id)->first();

        $single_data->delete();

        return redirect()->back()->with('success', "Faq is deleted successfull!");

    }

}
