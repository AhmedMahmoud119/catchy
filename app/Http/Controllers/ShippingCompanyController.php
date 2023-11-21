<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\ShippingCompany;
use Illuminate\Http\Request;

class ShippingCompanyController extends Controller
{

    public function index(Request $request)
    {
        $shippingCompanies = ShippingCompany::orderBy('id','DESC')->paginate(5);
        return view('admin.shipping-companies.index',compact('shippingCompanies'));
    }

    public function create()
    {
        $countries = Country::get();
        return view('admin.shipping-companies.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:shipping_companies,name',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $state = ShippingCompany::create([
            'name' => $request->input('name'),
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone'),
        ]);
        return redirect()->route('admin.shipping-companies.index')
            ->with('success','ShippingCompany Created Successfully');
    }


    public function edit($id)
    {
        $state = ShippingCompany::find($id);
        $countries = Country::get();
        return view('admin.shipping-companies.edit',compact('state','countries'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $state = ShippingCompany::find($id);
        $state->name = $request->input('name');
        $state->address = $request->input('address');
        $state->phone = $request->input('phone');
        $state->save();

        return redirect()->route('admin.shipping-companies.index')
            ->with('success','ShippingCompany updated successfully');
    }

    public function destroy($id)
    {
        \DB::table("shipping_companies")->where('id',$id)->delete();
        return redirect()->route('admin.shipping-companies.index')
            ->with('success','ShippingCompany deleted successfully');
    }
}
