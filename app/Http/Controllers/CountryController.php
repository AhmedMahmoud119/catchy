<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index(Request $request)
    {
        $countries = Country::orderBy('id','DESC')->paginate(5);
        return view('admin.countries.index',compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:countries,name',
        ]);

        $country = Country::create(['name' => $request->input('name')]);
        return redirect()->route('admin.countries.index')
            ->with('success','Country Created Successfully');
    }


    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.countries.edit',compact('country'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $country = Country::find($id);
        $country->name = $request->input('name');
        $country->save();

        return redirect()->route('admin.countries.index')
            ->with('success','Country updated successfully');
    }

    public function destroy($id)
    {
        \DB::table("countries")->where('id',$id)->delete();
        return redirect()->route('admin.countries.index')
            ->with('success','Country deleted successfully');
    }
}
