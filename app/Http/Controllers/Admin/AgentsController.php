<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentsController extends Controller
{


    public function index()
    {

        $Users = Agent::OrderBy('id', 'desc')->get();
        return view('Admin.Agent.index', compact('Users'));

    }


    public function Search(Request $request)
    {
        $query = DB::table('agents')->OrderBy('id', 'desc');
        if ($request->name != null) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->phone != null) {
            $query->where('phone', $request->phone);
        }
        $Users = $query->get();
        return view('Admin.Agent.index', compact('Users'));

    }


    public function view($id)
    {
        $User = Agent::find($id);
        return view('Admin.Agent.view', compact('User'));

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'id_num' => 'required',
            'email' => 'string|email|unique:owners',
            'phone' => 'required|string|unique:owners',
            'image' => 'nullable|image',

        ]);

        $User = new Agent;
        $User->name = $request->name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->id_num = $request->id_num;


        if ($request->file('image')) {
            $User->image = $request->image;

        }
        try {
            $User->save();
        } catch (Exception $e) {
            return back()->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try {
            Agent::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $User = Agent::find($request->id);
        return view('Admin.Agent.model', compact('User'));
    }


    public function update(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required|string',
            'id_num' => 'required|string|unique:agents,id_num,' . $request->id,
            'email' => 'string|email',
            'phone' => 'required|string',
            'image' => 'nullable|image',
        ]);


        if (Agent::where('phone', $request->phone)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'phone');
        }
        if (Agent::where('email', $request->email)->where('id', '!=', $request->id)->count() > 0) {
            return back()->with('message', 'email');
        }

        $User = Agent::find($request->id);
        $User->name = $request->name;
        $User->phone = $request->phone;
        $User->email = $request->email;
        $User->id_num = $request->id_num;

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


}
