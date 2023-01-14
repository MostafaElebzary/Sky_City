<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\AdvertisingImages;
use App\Models\ContactUs;
use App\Models\MainCategory;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Contactus()
    {
        return view('front.pages.ContactUs');
    }

    public function Home()
    {
        $sliders = Slider::where('is_visible', 1)->orderBy('sort', 'asc')->get();
        $sub_categories = SubCategory::where('is_visible', 1)->orderBy('id', 'asc')->get();
        $main_categories = MainCategory::where('is_visible', 1)->orderBy('id', 'asc')->get();
        $reviews = Review::orderBy('id', 'asc')->get();
        $advertisings = Advertising::where('is_visible', 1)->where('is_favorite', 1)->with('images')->orderBy('id', 'desc')->get();
        return view('front.pages.home', compact('sliders', 'advertisings', 'sub_categories', 'reviews', 'main_categories'));
    }

    public function AddReview(Request $request)
    {

        $data = $this->validate(request(), [
            'name' => 'required',
            'rate' => 'required',
            'description' => 'required',
            'advertising_id' => 'required',
        ]);

        Review::create($data);

        return back()->with('message', 'success');

    }

    public function Inbox(Request $request)
    {
        $data = $this->validate(request(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'advertising_id' => 'nullable',
            'g-recaptcha-response' => 'recaptcha',

        ]);


        ContactUs::create($data);

        return redirect()->back();

    }

    public function AdvertisingDetails($id)
    {
        $sliders = AdvertisingImages::where('advertising_id', $id)->orderBy('id', 'asc')->get();
        $data = Advertising::findOrFail($id);
        $data->view = $data->view + 1;
        $data->save();
        $reviews = Review::where('advertising_id', $id)->orderBy('id', 'asc')->get();
        return view('front.pages.AdvertisingDetails', compact('data', 'sliders', 'reviews'));
    }

    public function SubCategorySearch(Request $request)
    {

        $query = Advertising::OrderBy('id','desc');
        if($request->id){
            $query->where('id',$request->id);
        }
        if($request->category_id){

            $query->where('main_category_id', $request->category_id);

        }
        if ($request->sub_category_id != 0) {
            $query->where('sub_category_id', $request->sub_category_id);
        }
        if ($request->city_id) {
            $query->where('city_id', $request->city_id);
        }
        if ($request->district_id != 0) {

            $query->where('district_id', $request->district_id);
        }
        if (isset($request->district_area) && $request->district_area != '0') {

            $query->where('district_area', $request->district_area);
        }
        if ($request->priceFrom) {
            $query->where('price', '>=', $request->priceFrom);
        }
        if ($request->priceTo) {
            $query->where('price', '<=', $request->priceTo);
        }
        if ($request->spaceFrom) {
            $query->where('space', '>=', $request->spaceFrom);
        }
        if ($request->spaceTo) {
            $query->where('space', '<=', $request->spaceTo);
        }
        if ($request->name) {
            $query->where('ar_title', 'like', '%' . $request->name . '%')
                ->orwhere('en_title', 'like', '%' . $request->name . '%');
        }
        $ads = $query->with('images')->get();



        return view('front.pages.Search', compact('ads'));

    }

    public function SubCategory(Request $request ,$id)
    {

        $sub_category = SubCategory::findOrFail($id);
        $ads = Advertising::where('sub_category_id', $sub_category->id)->OrderBy('id','desc')->with('images')->get();

        if ($request->name || $request->sub_category_id ||
            $request->city_id || $request->district_id ||
            $request->priceFrom || $request->priceTo ||
            $request->spaceFrom || $request->spaceTo) {
            $ads = Advertising::query();

            if ($request->sub_category_id) {
                $sub_category = SubCategory::findOrFail($request->sub_category_id);
                $ads = $ads->where('sub_category_id', $request->sub_category_id);
            }
            if ($request->city_id) {
                $ads = $ads->where('city_id', $request->city_id);
            }
            if ($request->district_id) {
                $ads = $ads->where('district_id', $request->district_id);
            }
            if ($request->priceFrom) {
                $ads = $ads->where('price', '>=', $request->priceFrom);
            }
            if ($request->priceTo) {
                $ads = $ads->where('price', '<=', $request->priceTo);
            }
            if ($request->spaceFrom) {
                $ads = $ads->where('space', '>=', $request->spaceFrom);
            }
            if ($request->spaceTo) {
                $ads = $ads->where('space', '<=', $request->spaceTo);
            }
            if ($request->name) {
                $ads = $ads->where('ar_title', 'like', '%' . $request->name . '%')
                    ->orwhere('en_title', 'like', '%' . $request->name . '%');
            }
            $ads = $ads->with('images')->OrderBy('id','desc')->get();

        }


        return view('front.pages.SubCategory', compact('ads', 'sub_category'));

    }

}
