<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {

        $Setting = Setting::find(1);
        return view('Admin.setting.index', compact('Setting'));

    }


    public function store(Request $request)
    {

        $data = $this->validate(request(), [
            'logo' => 'image|mimes:png,jpg,jpeg',
            'about_image' => 'image|mimes:png,jpg,jpeg',
            'ar_name' => 'required',
            'en_name' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'phone2' => 'nullable',
            'phone3' => 'nullable',
            'phone4' => 'nullable',
            'fax' => 'required',
            'address' => 'required',
            'lat' => 'nullable',
            'lng' => 'nullable',
            'ar_aboutus' => 'required',
            'en_aboutus' => 'required',
            'home_video' => 'required',
            'ar_footer_description' => 'required',
            'en_footer_description' => 'required',
            'ar_terms' => 'required',
            'en_terms' => 'required',
            'welcome_message_en' => 'required',
            'welcome_message_ar' => 'required',

        ]);


        $Setting = Setting::find(1)->update($data);

        try {
            $Setting->save();
        } catch (\Exception $e) {
            return redirect('/setting')->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try {
            Setting::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $Setting = Setting::find($request->id);
        return view('Admin.setting.model', compact('Setting'));
    }


    public function update(Request $request)
    {

        $data = $this->validate(request(), [
            'logo' => 'image|mimes:png,jpg,jpeg',
            'about_image' => 'image|mimes:png,jpg,jpeg',
            'ar_name' => 'required',
            'en_name' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'phone2' => 'nullable',
            'phone3' => 'nullable',
            'phone4' => 'nullable',
            'fax' => 'required',
            'address' => 'required',
            'lat' => 'nullable',
            'lng' => 'nullable',
            'ar_aboutus' => 'required',
            'en_aboutus' => 'required',
            'home_video' => 'required',
            'ar_footer_description' => 'required',
            'en_footer_description' => 'required',
            'ar_terms' => 'required',
            'en_terms' => 'required',

        ]);


        try {
            $Setting = Setting::find(1);
            $Setting->update($data);




        } catch (Exception $e) {
            return back()->with('error_message', 'هناك خطأ ما فى عملية الاضافة');
        }
        return redirect()->back()->with('message', 'Success');
    }


}
