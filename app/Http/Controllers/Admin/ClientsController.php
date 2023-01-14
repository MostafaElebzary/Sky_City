<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    public function index()
    {

        $Users = Client::OrderBy('id', 'desc')->get();
        return view('Admin.Client.index', compact('Users'));

    }


    public function Search(Request $request)
    {
        $query = DB::table('clients')->OrderBy('id', 'desc');
        if ($request->name != null) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->phone != null) {
            $query->where('phone', $request->phone);
        }
        $Users = $query->get();
        return view('Admin.Client.index', compact('Users'));

    }

    public function Profile()
    {
        if (Auth::check()) {
            $User = Client::find(Auth::Client()->id);

        } else {
            return redirect()->back();
        }

        return view('Admin.Client.profile', compact('Client'));

    }

    public function view($id)
    {
        $User = Client::find($id);
        return view('Admin.Client.view', compact('Client'));

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'nullable|string|email|unique:clients',
            'phone' => 'required|string|unique:clients',
            'id_num' => 'required|string|unique:clients',
            'image' => 'nullable|image',

        ]);

        $User = new Client;
        $User->name = $request->name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->id_num = $request->id_num;
        $User->id_num_expired = $request->id_num_expired;
        $User->id_num_export = $request->id_num_export;
        $User->district = $request->district;
        $User->nationality = $request->nationality;
        $User->tax_num = $request->tax_num;
        $User->address = $request->address;

        if ($request->file('image')) {
            $User->image = $request->image;
        }
        try {
            $User->save();
            return redirect()->back()->with('message', 'Success');

        } catch (Exception $e) {
            return back()->with('error_message', 'Failed');
        }
    }

    public function delete(Request $request)
    {
        try {
            Client::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $User = Client::find($request->id);
        return view('Admin.Client.model', compact('User'));
    }


    public function update(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'nullable|string|email|unique:clients,email,'.$request->id,
            'phone' => 'required|string',
            'image' => 'nullable|image',
            'id_num' => 'required|string|unique:clients,id_num,'.$request->id,

        ]);



        $User = Client::find($request->id);
        $User->name = $request->name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->id_num = $request->id_num;
        $User->address = $request->address;
        $User->id_num_expired = $request->id_num_expired;
        $User->id_num_export = $request->id_num_export;
        $User->district = $request->district;
        $User->nationality = $request->nationality;
        $User->tax_num = $request->tax_num;

        if ($request->file('image')) {
            $User->image = $request->image;

        }


        try {
            $User->save();
        } catch (\Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }


    public function logout()
    {
        if (Auth::guard('admins')->check() || Auth::guard('suppliers')->check()) {
            auth_login()->logout();
            return redirect('/admin/login');
        } else {
            return redirect('/admin/login');
        }
    }


    public function Update_Profile(Request $request)
    {

        $this->validate(request(), [

        ]);


        if (Auth::check()) {
            $User = Client::find($request->id);
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
        $User = Client::find($request->id);
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
