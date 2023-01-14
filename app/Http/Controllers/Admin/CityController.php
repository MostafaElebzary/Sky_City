<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Setting;
use Illuminate\Http\Request;
use DB;
class CityController extends Controller
{
    public function index(){
        $Users = Setting::OrderBy('id','desc')->paginate(10);
        return view('Admin.City.index',compact('Users'));

    }



    public function store(Request $request)
    {

        $this->validate(request(),[
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $User=new Setting();
        $User->key=$request->key;
        $User->value=$request->value;
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
        try{
            City::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }


    public function edit(Request $request)
    {
        $User=Setting::find($request->id);

        return view('Admin.City.model',compact('User'));
    }


    public function update(Request $request)
    {

        $this->validate(request(),[
            'key' => 'required|string',
            'value' => 'required|string',

        ]);

        $User= Setting::findOrFail($request->id);
        $User->key=$request->key;
        $User->value=$request->value;
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
