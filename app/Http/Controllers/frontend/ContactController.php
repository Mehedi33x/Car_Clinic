<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.pages.contact.contact');
    }
    public function feedback()
    {
        return view('frontend.pages.feedback.feedback');
    }
    public function feedback_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Feedback::create([
            'customer_id' => auth('customers')->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        Toastr::success('Feedback Send Successfully', 'Success', ['options']);
        return to_route('feedback.webpage');
    }

    // backend
    public function view_feedback()
    {
        $feedback = Feedback::paginate(5)->all();
        // dd($feedback);
        return view('backend.pages.feedback.feedback', compact('feedback'));
    }
    public function delete_feedback($id)
    {
        $feedback = Feedback::find($id);
        $feedback->delete();

        return to_route('view.feedback')->with('message', 'Data deleted successfully!!!');
    }
}
