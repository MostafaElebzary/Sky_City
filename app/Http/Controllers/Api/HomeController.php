<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdDetailsResource;
use App\Http\Resources\AdsResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\SliderResource;
use App\Models\Advertising;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\OutInbox;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function sliders()
    {
        $slider = Slider::where('is_visible', 1)->orderBy('sort', 'asc')->get();
        $data = SliderResource::collection($slider);
        return response()->json(msgdata(success(), "تم بنجاح", $data));
    }

    public function settings($key)
    {
        $setting = Setting::where('key', $key)->first();
        $data = new SettingResource($setting);
        return response()->json(msgdata(success(), "تم بنجاح", $data));
    }


    public function posts()
    {
        $slider = Advertising::where('is_visible', 1)->get();
        $data = AdsResource::collection($slider);
        return response()->json(msgdata(success(), "تم بنجاح", $data));
    }

    public function post_details($id)
    {
        $slider = Advertising::where('id', $id)->with('faqs')->first();
        if (!$slider) {
            return response()->json(msgdata(not_found(), "غير موجود", (object)[]));
        }
        $slider->view = $slider->view + 1;
        $slider->save();
        $data = new AdDetailsResource($slider);
        return response()->json(msgdata(success(), "تم بنجاح", $data));
    }

    public function ContactUs(Request $request)
    {

        $rule = [
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required|string',
            'advertising_id' => 'nullable',


        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return response()->json(msgdata(error(), $validate->messages()->first(), []));
        }
        $data = ContactUs::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $request->message,
            'advertising_id' => $request->advertising_id,

        ]);

        return response()->json(msgdata(success(), "تم بنجاح", []));

    }

    public function OutContactUs(Request $request)
    {

        $rule = [
            'name' => 'required',
            'phone' => 'required',
            'type' => 'required|in:housing,real_estate',


        ];

        $validate = Validator::make($request->all(), $rule);
        if ($validate->fails()) {
            return response()->json(msgdata(error(), $validate->messages()->first(), []));
        }
        $data = OutInbox::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'type' => $request->type,


        ]);

        return response()->json(msgdata(success(), "تم بنجاح", []));

    }
}
