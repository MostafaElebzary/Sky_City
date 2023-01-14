<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\AdvLog;
use App\Models\Client;
use App\Models\Owner;
use App\Models\SellContract;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Alkoumi\LaravelHijriDate\Hijri;

class SellContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = SellContract::orderBy('contract_date', 'desc')->get();
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id', 8)->get();
        return view('Admin.SellContract.index', compact('contracts', 'owners', 'clients', 'ads'));
    }

    public function ClientContract($id)
    {
        $client = Client::findOrFail($id);
        $contracts = SellContract::where('client_id', $client->id)->orderBy('contract_date', 'desc')->get();
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id', 8)->get();
        return view('Admin.SellContract.index', compact('contracts', 'owners', 'clients', 'ads'));
    }

    public function OwnerContract($id)
    {
        $owner = Owner::findOrFail($id);
        $contracts = SellContract::where('owner_id', $owner->id)->orderBy('contract_date', 'desc')->get();
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id', 8)->get();
        return view('Admin.SellContract.index', compact('contracts', 'owners', 'clients', 'ads'));
    }

    public function search(Request $request)
    {
        $query = SellContract::OrderBy('contract_date', 'desc');
        if ($request->owner_id != null) {
            $query->where('owner_id', $request->owner_id);
        }
        if ($request->client_id != null) {
            $query->where('client_id', $request->client_id);
        }
        if ($request->ad_id != null) {
            $query->where('ad_id', $request->ad_id);
        }
        $contracts = $query->get();
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id', 8)->get();
        return view('Admin.SellContract.index', compact('contracts', 'owners', 'clients', 'ads'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id', 8)->get();
        return view('Admin.SellContract.create', compact('owners', 'clients', 'ads'));
    }

    public function owner_data(Request $request)
    {
        $owner = Owner::whereId($request->id)->first();
        return response(['data' => $owner]);
    }

    public function client_data(Request $request)
    {
        $owner = Client::whereId($request->id)->first();
        return response(['data' => $owner]);
    }

    public function ad_data(Request $request)
    {
        $owner = Advertising::whereId($request->id)->with(['City', 'District', 'owner'])->first();
        return response(['data' => $owner]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(), [
            'owner_id' => 'nullable|exists:owners,id',
            'owner_name' => 'required|string',
            'owner_nationality' => 'required|string',
            'owner_identification' => 'required|string',
            'owner_id_expire' => 'required|date',
            'owner_id_source' => 'required|string',
            'owner_address' => 'required|string',
            'owner_district' => 'required|string',
            'owner_phone' => 'required|string',

            'client_id' => 'nullable|exists:clients,id',
            'client_name' => 'required|string',
            'client_nationality' => 'required|string',
            'client_identification' => 'required|string',
            'client_id_expire' => 'required|date',
            'client_id_source' => 'required|string',
            'client_phone' => 'required|string',

            'ad_id' => 'nullable|exists:advertisings,id',
            'ad_name' => 'required|string',
            'ad_address' => 'required|string',
            'ad_area' => 'required|string',
            'ad_instrument_number' => 'required|string',
            'ad_instrument_date' => 'required|date',
            'peace_number' => 'nullable',

            'north_border' => 'required|string',
            'north_length' => 'required|string',
            'south_border' => 'required|string',
            'south_length' => 'required|string',
            'east_border' => 'required|string',
            'east_length' => 'required|string',
            'west_border' => 'required|string',
            'west_length' => 'required|string',

            'contract_date' => 'required|date',
            'amount' => 'required',
            'deposit' => 'required',
            'remaining' => 'required',
            'remaining_date' => 'required|date',
            'notes' => 'nullable|string',


        ]);

        $contract = SellContract::create($data);
        $log['advertising_id'] = $request->ad_id;
        $log['ar_description'] = "تم عمل عقد بيع للعقار رقم " . $request->ad_id . "للمشتري " . $request->client_name;
        $log['en_description'] = "A contract of sale of property No " . $request->ad_id . "for buyer " . $request->client_name;;

        if ($request->ad_id) {
            AdvLog::create($log);
        }
        return redirect('sell-contract-show/' . $contract->id)->with('message', 'Success');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = SellContract::findOrFail($id);
        $hijri_date = Hijri::Date('Y/m/j', Carbon::parse($contract->contract_date));

        return view('Admin.SellContract.show', compact('contract', 'hijri_date'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function delete(Request $request)
    {
        try {
            SellContract::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
