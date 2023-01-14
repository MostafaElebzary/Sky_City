<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReceiptType;
use Illuminate\Http\Request;

class ReceiptTypeController extends Controller
{
    public function index(){
        $Users = ReceiptType::OrderBy('id','desc')->paginate(10);
        return view('Admin.ReceiptType.index',compact('Users'));

    }



    public function store(Request $request)
    {

        $this->validate(request(),[
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
        ]);

        $User=new ReceiptType();
        $User->ar_title=$request->name_ar;
        $User->en_title=$request->name_en;


        try {
            $User->save();

        } catch (Exception $e) {
            return back()->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try{
            ReceiptType::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function edit(Request $request)
    {
        $User=ReceiptType::find($request->id);

        return view('Admin.ReceiptType.model',compact('User'));
    }


    public function update(Request $request)
    {

        $this->validate(request(),[
            'name_ar' => 'required|string',
            'name_en' => 'required|string',

        ]);

        $User= ReceiptType::find($request->id);
        $User->ar_title=$request->name_ar;
        $User->en_title=$request->name_en;


        try {

            $User->save();

        } catch (\Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

}
