<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use DB;
class InvoiceController extends Controller
{
    public function index(){

        $places = Invoice::OrderBy('id','desc')->get()->groupBy('order_id')->toArray();
                    
        $total = count($places); 
        $perPage = 11;
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $currentItems = array_slice($places, $perPage * ($currentPage - 1), $perPage);
        
        $paginator = new LengthAwarePaginator($currentItems, count($places), $perPage, $currentPage);

        $Invoices = $paginator->appends('filter', request('filter'));

        return view('Admin.Invoice.index',compact('Invoices'));

    }

    public function show($id)
    {

        $query['data'] = Invoice::where('order_id', $id)->get();
        $inv = Invoice::where('order_id', $id)->get()->last();
        $inv_total = $inv->total_amount + $inv->total_vat;
        $generatedString = [
            $this->toString("مؤسسة", '1'),
            $this->toString("123456789456123", '2'),
            $this->toString($inv->created_at, '3'),
            $this->toString($inv_total, '4'),
            $this->toString($inv->total_vat, '5'),
        ];

        $query['qrcode'] = QrCode::size(150)->generate($this->toBase64($generatedString));

        return view('Admin.Invoice.show', $query);
    }

    public function store(Request $request)
    {

        $this->validate(request(),[
            'client_name' => 'required',
            'client_phone' => 'required',
            'date' => 'required'
        ]);

        $latest_order = Invoice::select("order_id")->latest('order_id')->first();

        if ($latest_order == null) {
            $latest_order_id = 1;
        } else {
            $latest_order_id = $latest_order->order_id + 1;
        }

        $total_amount = 0;
        $total_vat = 0;
        foreach ($request->description_ar as $key => $product) {

            if ($request->description_ar[$key] != null) {
                $inv = new Invoice();
                $inv->order_id = $latest_order_id;
                $inv->order_type = 0;
    
                $inv->client_name = $request->client_name;
                $inv->client_phone = $request->client_phone;
                $inv->client_address = $request->client_address;
                $inv->client_state = $request->client_state;
                $inv->client_city = $request->client_city;
    
                $inv->date = $request->date;
                $inv->issue_date = $request->issue_date;
                $inv->due_date = $request->due_date;
    
                $inv->description_ar = $request->description_ar[$key];
                $inv->description_en = $request->description_en[$key];
                $inv->quantity = $request->quantity[$key];
                $inv->price = $request->price[$key];
                $inv->vat = $request->vat[$key];
                $inv->amount = ($request->price[$key] + $request->vat[$key]) * $request->quantity[$key];
    
                $total_amount += $request->quantity[$key] * $request->price[$key];
                $total_vat += $request->quantity[$key] * $request->vat[$key];

                $inv->total_amount = $total_amount;
                $inv->total_vat = $total_vat;
                $inv->save();
            }
            
        }
        
        return redirect()->back()->with('message', 'Success');
    }

    public function delete(Request $request)
    {
        try{
            Invoice::where('order_id',$request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message'=>'Failed']);
        }
        return response()->json(['message'=>'Success']);
    }

    public function update(Request $request)
    {
        $orders = Invoice::where('order_id', $request->id)->get();

        $last_row = Invoice::select('order_id')->latest()->first();
        $ord_num = $last_row->order_id + 1;

        foreach ($orders as $order) {
            $ord = Invoice::find($order->id);
            $newOrder = $ord->replicate();
            $newOrder->order_id = $ord_num;
            $newOrder->order_return = $order->order_id;
            $newOrder->order_type = 1;
            $newOrder->created_at = Carbon::now();
            $newOrder->save();
        }

        return response()->json(['message'=>'Success']);
    }

    public function toBase64($value): string
    {
        return base64_encode($this->toTLV($value));
    }

    public function toTLV($value): string
    {
        return implode('', $value);
    }

    public function toString($value, $tag)
    {
        $value = (string)$value;

        return $this->toHex($tag) . $this->toHex($this->getLength($value)) . ($value);
    }

    protected function toHex($value)
    {
        return pack("H*", sprintf("%02X", $value));
    }

    public function getLength($value)
    {
        return strlen($value);
    }

}
