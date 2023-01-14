<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Owner;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {

        $Users = Faq::OrderBy('sort', 'asc')->get();
        return view('Admin.faq.index', compact('Users'));

    }

    public function Search(Request $request)
    {
        $query = Faq::OrderBy('id', 'desc');
        if ($request->name != null) {
            $query->where('ar_title', 'like', '%' . $request->name . '%')
                ->orwhere('en_title', 'like', '%' . $request->name . '%');
        }

        $Users = $query->get();
        return view('Admin.faq.index', compact('Users'));

    }

    public function view($id)
    {
        $User = Faq::find($id);
        return view('Admin.faq.view', compact('User'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'ar_title' => 'nullable|string',
            'en_title' => 'nullable|string',
            'ar_description' => 'nullable|string',
            'en_description' => 'nullable|string',
            'is_visible' => 'required|string',
            'sort' => 'required|string',
            'advertising_id' => 'nullable|string',


        ]);

        $User = new Faq();
        $User->ar_title = $request->ar_title;
        $User->en_title = $request->en_title;
        $User->ar_description = $request->ar_description;
        $User->en_description = $request->en_description;
        $User->is_visible = $request->is_visible;
        $User->sort = $request->sort;

        if ($request->advertising_id && $request->advertising_id != null) {
            $User->advertising_id = $request->advertising_id;
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
            Faq::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $User = Faq::find($request->id);
        return view('Admin.faq.model', compact('User'));
    }


    public function update(Request $request)
    {

        $this->validate(request(), [
            'ar_title' => 'nullable|string',
            'en_title' => 'nullable|string',
            'ar_description' => 'nullable|string',
            'en_description' => 'nullable|string',
            'is_visible' => 'required|string',
            'sort' => 'required|string',

            'advertising_id' => 'nullable|string',
        ]);


        $User = Faq::find($request->id);
        $User->ar_title = $request->ar_title;
        $User->en_title = $request->en_title;
        $User->ar_description = $request->ar_description;
        $User->en_description = $request->en_description;
        $User->is_visible = $request->is_visible;
        $User->sort = $request->sort;
        $User->advertising_id = $request->advertising_id;


        try {
            $User->save();
        } catch (\Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }


}
