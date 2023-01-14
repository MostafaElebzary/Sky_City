<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\AdvLog;
use App\Models\Client;
use App\Models\Owner;
use App\Models\RentContract;
use App\Models\SellContract;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Alkoumi\LaravelHijriDate\Hijri;

class RentContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = RentContract::orderBy('contract_start_date', 'desc')->where('ad_id','!=',null)->get();
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id', 9)->get();
        return view('Admin.RentContract.index', compact('contracts', 'owners', 'clients', 'ads'));
    }

    public function index2()
    {
        $contracts = RentContract::orderBy('contract_start_date', 'desc')->where('ad_id',null)->get();
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id', 9)->get();
        return view('Admin.RentContract.index', compact('contracts', 'owners', 'clients', 'ads'));
    }


    public function ClientContract($id)
    {
        $client = Client::findOrFail($id);
        $contracts = RentContract::where('client_id', $client->id)->orderBy('contract_start_date', 'desc')->get();
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id',9)->get();
        return view('Admin.RentContract.index', compact('contracts', 'owners', 'clients', 'ads'));
    }

    public function OwnerContract($id)
    {
        $owner = Owner::findOrFail($id);
        $contracts = RentContract::where('owner_id', $owner->id)->orderBy('contract_start_date', 'desc')->get();
        $owners = Owner::all();
        $clients = Client::all();
        $ads = Advertising::where('status', 1)->where('main_category_id', 9)->get();
        return view('Admin.RentContract.index', compact('contracts', 'owners', 'clients', 'ads'));
    }

    public function search(Request $request)
    {
        $query = RentContract::OrderBy('contract_start_date', 'desc');
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
        $ads = Advertising::where('status', 1)->where('main_category_id', 9)->get();
        return view('Admin.RentContract.index', compact('contracts', 'owners', 'clients', 'ads'));

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
        $ads = Advertising::where('status', 1)->where('main_category_id', 9)->get();
        return view('Admin.RentContract.create', compact('owners', 'clients', 'ads'));
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
        $owner = Advertising::whereId($request->id)->with(['City', 'District','owner'])->first();
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
            'owner_identification' => 'required|string',
            'owner_phone' => 'required|string',

            'client_id' => 'nullable|exists:clients,id',
            'client_name' => 'required|string',
            'client_identification' => 'required|string',
            'client_phone' => 'required|string',
            'client_id_expire' => 'required|date',
            'client_id_source' => 'required|string',
            'client_address' => 'required|string',

            'ad_id' => 'nullable|exists:advertisings,id',
            'ad_name' => 'required|string',
            'ad_city' => 'required|string',
            'ad_district' => 'required|string',
            'ad_instrument_number' => 'required|string',
            'ad_instrument_date' => 'required|date',

            'contract_start_date' => 'required|date',
            'contract_end_date' => 'required|date',
            'contract_duration' => 'required|string',
            'annual_rent' => 'required',
            'contract_deposit' => 'required',
            'insurance_amount' => 'required',
            'rent_type' => 'required|string',
            'notes' => 'nullable|string',


        ]);

        $contract = RentContract::create($data);

        $log['advertising_id'] = $request->ad_id;
        $log['ar_description'] = "تم عمل عقد تأجير للعقار رقم " . $request->ad_id . "للعميل " . $request->client_name;
        $log['en_description'] = "A contract of rent of property No " . $request->ad_id . "for client " . $request->client_name;;
        if($request->ad_id) {
            AdvLog::create($log);
        }
        return redirect('rent-contract-show/' . $contract->id)->with('message', 'Success');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = RentContract::findOrFail($id);
        $hijri_date = Hijri::Date('Y/m/j', Carbon::parse($contract->contract_start_date));

        return view('Admin.RentContract.show', compact('contract', 'hijri_date'));

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
            RentContract::whereIn('id', $request->id)->delete();
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
