<?php

namespace App\Http\Controllers;

use App\Models\CompanyCostState;
use App\Models\Country;
use App\Models\ShippingCompany;
use App\Models\ShippingCompanyCost;
use App\Models\State;
use Illuminate\Http\Request;

class ShippingCompanyCostController extends Controller
{

    public function index(Request $request)
    {
        $shippingCompanyCosts = ShippingCompanyCost::orderBy('id', 'DESC')->paginate(5);

        return view('admin.shipping-company-costs.index', compact('shippingCompanyCosts'));
    }

    public function create()
    {
        $states = State::get();
        $shippingCompanies = ShippingCompany::get();

        return view('admin.shipping-company-costs.create', compact('states', 'shippingCompanies'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'shipping_company_id' => 'required',
            'state_id'            => 'required',
            'price'               => 'required',
            'refund_price'        => 'required',
        ]);

        $shippingCompanyCost = ShippingCompanyCost::create([
            'shipping_company_id' => $request->shipping_company_id,
            'price'               => $request->price,
            'refund_price'        => $request->refund_price,
        ]);

        foreach ($request->state_id as $state_id) {
            $shippingCompanyCost->companyCostStates()->create([
                'state_id' => $state_id,
            ]);
        }


        return redirect()->route('admin.shipping-company-costs.index')->with('success',
            'ShippingCompanyCost Created Successfully');
    }

    public function edit($id)
    {
        $shippingCompanyCost = ShippingCompanyCost::find($id);
        $states = State::get();
        $shippingCompanies = ShippingCompany::get();

        return view('admin.shipping-company-costs.edit', compact('shippingCompanyCost', 'states', 'shippingCompanies'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'shipping_company_id' => 'required',
            'state_id'            => 'required',
            'price'               => 'required',
            'refund_price'        => 'required',
        ]);

        $shippingCompanyCost = ShippingCompanyCost::find($id);
        $shippingCompanyCost->update($request->all());

        $shippingCompanyCost->companyCostStates()->delete();

        foreach ($request->state_id as $state_id) {
            $shippingCompanyCost->companyCostStates()->create([
                'state_id' => $state_id,
            ]);
        }

        return redirect()->route('admin.shipping-company-costs.index')->with('success',
            'ShippingCompanyCost Updated Successfully');
    }

    public function destroy($id)
    {
        CompanyCostState::where('shipping_company_cost_id', $id)->delete();
        ShippingCompanyCost::where('id', $id)->delete();

        return redirect()->route('admin.shipping-company-costs.index')->with('success',
            'ShippingCompanyCost Deleted Successfully');
    }
}
