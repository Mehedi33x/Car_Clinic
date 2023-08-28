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
        // return view('');
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
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',

        ]);
        $user_image = '';
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $user_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/mechanics', $user_image);
        }
        // dd($user_image);
        User::create([
            // clm name ---------- input field name
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'password' => $request->password,
            'contact' => $request->contact,
            'address' => $request->address,
            'image' => $user_image,
        ]);
        return to_route('user.list')->with('message', 'User added successfully !!!');
    }
    // user view
    public function user_view($id)
    {
        $user = User::where('role', 'admin')->find($id);
        // dd($user);
        return view('backend.pages.user.user_view', compact('user'));
    }
    public function user_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return to_route('user.list')->with('message', 'Data deleted successfully !!!');
    }













    //profile edit
    public function user_profile()
    {
        return view('backend.pages.user.user_profile');
    }
    //profile edit
    public function edit_profile()
    {
        return view('backend.pages.user.profile_edit');
    }
    //profile edits
    public function update_profile(Request $request)
    {

        // dd($request->all());
        $user = User::find(auth()->user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
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
            'password' => $request->password ?? bcrypt($request->password),
            'image' => $user_image,
        ]);

        return to_route('user.profile')->with('message', 'Data update successfully!!!');
    }
}
