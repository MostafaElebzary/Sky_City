<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\AdvertisingImages;
use App\Models\AdvLog;
use Illuminate\Http\Request;
use DB;
use Auth;
use Yajra\DataTables\DataTables;

class AdvertisingController extends Controller
{
    public function index()
    {
        $Users = Advertising::OrderBy('id', 'desc')->paginate(10);
        return view('Admin.Advertising.index', compact('Users'));

    }

    public function datatable()
    {
        $data = Advertising::orderBy('id', 'desc');
        $data = $data->get();
        return DataTables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('created_at', function ($row) {
                $name = \Carbon\Carbon::parse($row->created_at)->format('Y-m-d');
                if ($name) {
                    return $name;
                } else {
                    return '';
                }
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 1) {
                    return __('lang.available');
                } else {
                    return __('lang.unavailable');
                }
            })
            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_visible == 1) {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })

            ->addColumn('images', function ($row) {
                $actions = '<a class="btn btn-danger"
                                           href="' . url("AdvertisingImages/" . $row->id) . '"> ' . __("lang.Images") . '</a>';
                return $actions;

            })
//            ->addColumn('actions', function ($row) {
//                $actions = '<a class="btn btn-success"
//                                           href="' . url("AdvLogs/" . $row->id) . '"> ' . __("lang.Actions") . '</a>';
//                return $actions;
//
//            })
            ->addColumn('edits', function ($row) {
                $actions = '<a class="btn btn-success btn-sm btn-clean btn-icon btn-icon-md edit-Advert"
                                           href="Edit_Advertising/' . $row->id . '" data-original-title="' . __("lang.Users_Edit") . '"
                                           title="' . __("lang.Users_Edit") . '">
                                            <i class="fa fa-edit icon-nm"></i>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'branche', 'is_favorite', 'is_active', 'images', 'edits'])
            ->make();
    }

    public function AdvLogs($id)
    {
        $Users = AdvLog::OrderBy('id', 'desc')->where('advertising_id', $id)->paginate(10);

        return view('Admin.Advertising.AdvLog', compact('Users'));
    }

    public function index3($id)
    {
        $Users = Advertising::where('owner_id', $id)->paginate(10);
        return view('Admin.Advertising.index', compact('Users'));

    }

    public function index2($id)
    {
        $Users = Advertising::where('id', $id)->paginate(10);
        return view('Admin.Advertising.index', compact('Users'));

    }

    public function Search(Request $request)
    {
        $query = DB::table('Advertisings')->OrderBy('id', 'desc');
        if ($request->name != null) {
            $query->where('ar_title', 'like', '%' . $request->name . '%')->orWhere('en_title', 'like', '%' . $request->name . '%');
        }
        if ($request->main_category_id) {
            $query->where('main_category_id', $request->main_category_id);
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }
        $Users = $query->paginate(10);
        return view('Admin.Advertising.index', compact('Users'));

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'ar_title' => 'required|string',
            'en_title' => 'required|string',
            'image' => 'required|image',


        ]);

        $User = new Advertising;
        $User->ar_title = $request->ar_title;
        $User->en_title = $request->en_title;

        $User->ar_description = $request->ar_description;
        $User->en_description = $request->en_description;
        $User->is_visible = $request->is_active;
        $User->lat = $request->lat;
        $User->lng = $request->lng;
        $User->status = $request->status;
        $User->video_link = $request->video_link;
        $User->created_by = Auth::user()->id;

        if ($request->file('image')) {
            $User->image = $request->image;
        }
        $User->save();

        try {
            if ($request->file('images')) {
                foreach ($request->images as $image) {
                    $data = new AdvertisingImages();
                    $data->image = $image;
                    $data->advertising_id = $User->id;
                    $data->save();
                }
            }

        } catch (\Exception $e) {
            return back()->with('error_message', 'Failed');
        }
        return redirect('Advertising')->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try {
            Advertising::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }

    public function edit($id)
    {
        $User = Advertising::findOrFail($id);
        return view('Admin.Advertising.model', compact('User'));
    }

    public function update(Request $request)
    {

        $this->validate(request(), [
            'ar_title' => 'required|string',
            'en_title' => 'required|string',
            'image' => 'nullable|dimensions:min_width=500,min_height=500'
        ]);


        $User = Advertising::find($request->id);
        $User->ar_title = $request->ar_title;
        $User->en_title = $request->en_title;
        $User->ar_description = $request->ar_description;
        $User->en_description = $request->en_description;
        $User->lat = $request->lat;
        $User->lng = $request->lng;
        $User->status = $request->status;
        $User->video_link = $request->video_link;

        if ($request->file('image')) {
            $User->image = $request->image;
        }


        try {
            $User->save();
        } catch (\Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect('Advertising')->with('message', 'Success');
    }

    public function UpdateStatusAdvertising(Request $request)
    {
        $data = Advertising::find($request->id);
        if ($data->is_visible == 1) {
            $data->is_visible = 0;
        } else {
            $data->is_visible = 1;

        }
        $data->save();
        return response()->json(['message' => 'Success']);

    }

    public function UpdateFavoriteAdvertising(Request $request)
    {
        $data = Advertising::find($request->id);
        if ($data->is_favorite == 1) {
            $data->is_favorite = 0;
        } else {
            $data->is_favorite = 1;

        }
        $data->save();
        return response()->json(['message' => 'Success']);

    }

}
