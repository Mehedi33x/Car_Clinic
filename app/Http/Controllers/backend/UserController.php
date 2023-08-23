<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function user_list()
    {
        $users = User::where('role', 'admin')->paginate(5);
        return view('backend.pages.user.user_list', compact('users'));
        return view('');
    }

    public function user_add()
    {
        return view('backend.pages.user.user_add');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contact' => 'required',
            'address' => 'required',

        ]);
        User::create([
            // clm name ---------- input field name
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact' => $request->contact,
            'address' => $request->address,
        ]);
        return to_route('user.list');
    }

    public function user_profile()
    {
        return view('backend.pages.user.user_profile');
    }

    public function edit_profile()
    {
        return view('backend.pages.user.user_edit');
    }
    public function update_profile(Request $request)
    {

        // dd($request->all());
        $user = User::find(auth()->user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user_image = $user->image;
        // dd(public_path('images/mechanics/'.$mechanic_image));
        if ($image = $request->file('image')) {
            if (file_exists(public_path('uploads/mechanics/' . $user_image))) {
                // Log::useFiles('path', 'level');
                // File::delete($oldimage);

                File::delete(public_path('uploads/mechanics/' . $user_image));
            }
            $user_image = date('Ymdhsi') . '-' . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/mechanics/', $user_image);
        }

        $user->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'address' => $request->address,
            'password' => bcrypt($request->name),
            'image' => $user_image,
        ]);

        return to_route('user.profile')->with('message', 'Data update successfully!!!');
    }
}
