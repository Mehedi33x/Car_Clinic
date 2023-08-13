<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    // front
    public function supoort()
    {
        return view('frontend.pages.support.support');
    }

    public function message(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'message' => 'required'
        ]);

        Support::create([

            'from_user' => auth('customers')?->user()?->id,
            'to_user' => 1,
            'message' => $request->message,

        ]);

        return redirect()->back()->with('message', 'message sent sucessfully');
    }





    //admin panel
    public function admin_support()
    {
        $message = Support::with(['userFrom', 'userTo'])->orderBy('id', 'DESC')->paginate(10);
        // dd($message);
        return view('backend.pages.support.support', compact('message'));
    }

    public function admin_reply($id)
    {
        return view('backend.pages.support.reply', compact('id'));
    }

    public function send_reply(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'message' => 'required'
        ]);
        // dd($request->all());
        $conversation = Support::find($request->message_id);
        dd($conversation);
        Support::create([
            'from_user' => auth()?->user()?->id,
            'to_user' => $conversation->from_user,
            'message' => $request->message,
            "from_message" => "admin"
        ]);

        return to_route('admin.support');
    }
}
