<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{


    public function index()
    {
        $Users = ContactUs::OrderBy('id', 'desc')->paginate(10);
        return view('Admin.ContactUs.index', compact('Users'));
    }

    public function index2($id)
    {
        $Users = ContactUs::where('id', $id)->get();
        ContactUs::where('id',$id)->update([
            'is_read'=>1
        ]);
        return view('Admin.ContactUs.index', compact('Users'));
    }

    public function edit(Request $request)
    {
        $User = ContactUs::where('id', $request->id)->first();
        ContactUs::where('id',$request->id)->update([
            'is_read'=>1
        ]);
        return view('Admin.ContactUs.model', compact('User'));
    }


    public function delete(Request $request)
    {
        try {
            ContactUs::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

}
