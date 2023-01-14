<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    public function index()
    {

        $Users = User::OrderBy('id', 'desc')->get();
        return view('Admin.Admin.index', compact('Users'));

    }


    public function Search(Request $request)
    {
        $query = DB::table('users')->OrderBy('id', 'desc');
        if ($request->name != null) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->phone != null) {
            $query->where('phone', $request->phone);
        }
        $Users = $query->get();
        return view('Admin.Admin.index', compact('Users'));

    }

    public function Profile()
    {
        if (Auth::check()) {
            $User = User::find(Auth::user()->id);

        } else {
            return redirect()->back();
        }

        return view('Admin.Admin.profile', compact('User'));

    }

    public function view($id)
    {
        $User = User::find($id);
        return view('Admin.Admin.view', compact('User'));

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'string|email|unique:users',
            'phone' => 'required|string|unique:users',
            'image' => 'nullable|image',

        ]);

        $User = new User;
        $User->name = $request->name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->password = $request->password;

        if ($request->file('image')) {
            $User->image = $request->image;
        }
        try {
            $User->save();
            $User->roles()->sync([$request->role]);
        } catch (Exception $e) {
            return back()->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try {
            User::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $User = User::find($request->id);
        return view('Admin.Admin.model', compact('User'));
    }


    public function update(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'string|email',
            'phone' => 'required|string',
            'image' => 'nullable|image',
        ]);


        if (User::where('phone', $request->phone)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'phone');

        }
        if (User::where('email', $request->email)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'email');

        }

        $User = User::find($request->id);
        $User->name = $request->name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        if ($request->password) {
            $User->password = $request->password;
        }

        if ($request->file('image')) {
            $User->image = $request->image;

        }
        try {
            $User->save();
            $User->roles()->sync([$request->role]);
        } catch (\Exception $e) {

            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }


    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/login');
        } else {
            return redirect('/login');
        }
    }


    public function Update_Profile(Request $request)
    {

        $this->validate(request(), [

        ]);


        if (Auth::check()) {
            $User = User::find($request->id);
        } else {
            return redirect()->back();
        }

        $User->name = $request->name;
        $User->phone = $request->phone;

        if ($request->password) {
            $User->password = $request->password;
        }
        if ($request->file('image')) {
            $User->image = $request->image;

        }

        try {
            $User->save();

        } catch (\Exception $e) {
            return back()->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function UpdateStatusUser(Request $request)
    {
        $User = User::find($request->id);
        if ($User->is_active == 1) {
            $User->is_active = 0;
        } else {
            $User->is_active = 1;

        }
        $User->save();
        return response($User);

    }


    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'phone' => 'required|string',
            'password' => 'required',
        ]);

        if (!is_array($validator) && $validator->fails()) {
            return redirect()->back()->with('message', 'Failed');
        }


        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {

            $ip = $request->ip();

            return redirect('/Admin-Panel');
        }


        return redirect()->back()->with('message', 'Failed');


    }


}
