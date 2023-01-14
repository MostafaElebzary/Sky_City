<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvertisingImages;
class AdvertisingImagesController extends Controller
{

    public function ProductsImages($id)
    {
        $Users=AdvertisingImages::where('advertising_id',$id)->get();
        return view('Admin.Advertising.images',compact('Users','id'));
    }
    public function Create_ProductsImages(Request $request){

        if($files=$request->file('image')){
            foreach($files as $file){
            $Image = new AdvertisingImages();
            $Image->image=$file;
            $Image->advertising_id=$request->product_id;
            $Image->save();
            }
        }
        return redirect()->back()->with('message', 'Success');

    }
    public function Edit_ProductsImages(Request $request)
    {
        $User=AdvertisingImages::find($request->id);
        return view('Admin.Advertising.ImageModel',compact('User'));
    }
    public function Update_ProductsImages(Request $request){

        if($file=$request->file('image')){
            $Image =  AdvertisingImages::find($request->id);
            $Image->image=$request->image;
            $Image->save();
        }
        return redirect()->back()->with('message', 'Success');

    }
    public function Delete_ProductsImages(Request $request)
    {
        try{
            AdvertisingImages::whereIn('id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }

}
