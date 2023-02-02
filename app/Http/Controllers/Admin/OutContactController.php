<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\OutInbox;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OutContactController extends Controller
{


    public function index()
    {
        $Users = OutInbox::OrderBy('id', 'desc')->paginate(10);
        return view('Admin.OutContactUs.index', compact('Users'));
    }

    public function index2($id)
    {
        $Users = OutInbox::where('id', $id)->get();
        OutInbox::where('id',$id)->update([
            'is_read'=>1
        ]);
        return view('Admin.OutContactUs.index', compact('Users'));
    }

    public function edit(Request $request)
    {
        $User = OutInbox::where('id', $request->id)->first();
        ContactUs::where('id',$request->id)->update([
            'is_read'=>1
        ]);
        return view('Admin.OutContactUs.model', compact('User'));
    }


    public function delete(Request $request)
    {
        try {
            OutInbox::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

}
