<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function mechanic_list()
    {
        $mechanics = User::where('role', 'mechanic')->paginate(5);
        return view('backend.pages.mechanic.mechanic_list', compact('mechanics'));
    }

    public function view_mechanic($id)
    {
        $mechanic = User::findOrFail($id);
        // dd($mechanic);
        return view('backend.pages.mechanic.view_mechanic', compact('mechanic'));
    }


    public function add_mechanic()
    {
        return view('backend.pages.mechanic.add_mechanic');
    }



    public function store_mechanic(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
        ]);

        // dd($request->all());
        $mechanic_image = '';
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $mechanic_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/mechanics', $mechanic_image);
        }
        User::create([
            'image' => $mechanic_image,
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => bcrypt($request->password),
            'password' => $request->password,
            'role' => 'mechanic',
            'contact' => $request->contact,
            'address' => $request->address,
        ]);
        return to_route('mechanic.list')->with('message', 'Data added successfully!!!');
    }


    public function edit_mechanic($id)
    {
        $mechanic = User::findOrFail($id);
        return view('backend.pages.mechanic.edit_mechanic', compact('mechanic'));
    }
    public function update_mechanic(Request $request, $id)
    {
        $mechanic = User::findOrFail($id);
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
        ]);

        $mechanic_image = $mechanic->image;
        // dd(public_path('images/mechanics/'.$mechanic_image));
        if ($image = $request->file('image')) {
            if (file_exists(public_path('uploads/mechanics/' . $mechanic_image))) {
                // Log::useFiles('path', 'level');
                // File::delete($oldimage);

                File::delete(public_path('uploads/mechanics/' . $mechanic_image));
            }
            $mechanic_image = time() . '-' . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/mechanics/', $mechanic_image);
        }

        $mechanic->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'status' => $request->status,
            'password' => $request->password ?? bcrypt($request->password),
            "image" => $mechanic_image
        ]);
        return to_route('mechanic.list');
    }


    public function delete_mechanic($id)
    {
        $mechanic = User::findOrFail($id);
        //dd($mechanic);
        $oldimage = 'uploads/mechanics' . $mechanic->image;
        if (file_exists($oldimage)) {
            // Log::useFiles('path', 'level');
            // File::delete($oldimage);
            File::delete($oldimage);
        }
        $mechanic->delete();
        //  notify()->success('Laravel Notify is awesome!');
        //  return to_route('mechanic.list');
        return to_route('mechanic.list')->with('message', 'Data deleted successfully');
    }
}
