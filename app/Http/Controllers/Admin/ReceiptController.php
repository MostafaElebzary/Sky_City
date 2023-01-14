<?php

namespace App\Http\Controllers\Admin;

use Alkoumi\LaravelHijriDate\Hijri;
use App\Http\Controllers\Controller;
use App\Models\AdvLog;
use App\Models\Receipt;
use Carbon\Carbon;
use I18N_Arabic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{

    public function index2()
    {

        $Users = Receipt::OrderBy('id', 'desc')->get();
        $id = null;
        return view('Admin.Receipt.index', compact('Users','id'));

    }
    public function index($id)
    {

        $Users = Receipt::OrderBy('id', 'desc')->where('client_id',$id)->get();

        return view('Admin.Receipt.index', compact('Users','id'));

    }


    public function Search(Request $request)
    {
        $query = Receipt::OrderBy('id', 'desc');
        if(isset($request->id)){
        $query->where('client_id',$request->id);
            $id = $request->id;

        }else{
            $id = null;

        }
        if ($request->from) {
            $query->whereDate('created_at', '>=', $request->from);
        }
        if ($request->to) {
            $query->whereDate('created_at', '<=', $request->to);
        }
        if($request->type){
            $query->where('type',$request->type);
        }
        if($request->pay_type){
            $query->where('pay_type',$request->pay_type);
        }
        $Users = $query->get();

        return view('Admin.Receipt.index', compact('Users','id'));

    }


    public function view($id)
    {
        $User = Receipt::find($id);
        $hijri_date = Hijri::Date('Y/m/j', Carbon::parse($User->created_at));
        $id = $User->client_id;

        return view('Admin.Receipt.print2', compact('User','hijri_date','id'));

    }
    public function printReceipt($id)
    {
        $User = Receipt::find($id);
        $hijri_date = Hijri::Date('Y/m/j', Carbon::parse($User->created_at));
        $id = $User->client_id;
        return view('Admin.Receipt.print', compact('User','hijri_date','id'));

    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'type' => 'required|string',
            'client_id' => 'required|string|unique:clients,id,' . $request->client_id,
            'pay_type' => 'string|required',
            'network_num' => 'nullable|string',
            'network_date' => 'nullable|string',
            'price' => 'required|string',
            'note' => 'nullable|string',
            ]);

        $User = new Receipt;
        $User->type = $request->type;
        $User->client_id = $request->client_id;
        $User->pay_type = $request->pay_type;
        $User->network_date = \Carbon\Carbon::parse($request->network_date)->format('Y-m-d H:i:s');
        $User->network_num = $request->network_num;
        $User->price = $request->price;
        $User->note = $request->note;
        $User->bank_name = $request->bank_name;
        $User->check_number = $request->check_number;
        $User->check_date = $request->check_date;
        $User->save();

        try {
        } catch (Exception $e) {
            return back()->with('error_message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try {
            Receipt::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    public function edit(Request $request)
    {
        $User = Agent::find($request->id);
        return view('Admin.Agent.model', compact('User'));
    }


    public function update(Request $request)
    {

        $this->validate(request(), [
            'type' => 'required|string',
            'client_id' => 'required|string|unique:clients,id,' . $request->id,
            'pay_type' => 'string|required',
            'network_num' => 'nullable|string',
            'network_date' => 'nullable|string',
            'price' => 'required|string',
            'note' => 'nullable|string',
        ]);



        $User = Receipt::find($request->id);
        $User->type = $request->type;
        $User->client_id = $request->client_id;
        $User->pay_type = $request->pay_type;
        $User->network_date = $request->network_date;
        $User->network_num = $request->network_num;
        $User->price = $request->price;
        $User->note = $request->note;


        try {
            $User->save();
        } catch (\Exception $e) {
            return back()->with('message', 'Failed');
        }
        return redirect()->back()->with('message', 'Success');
    }


}
