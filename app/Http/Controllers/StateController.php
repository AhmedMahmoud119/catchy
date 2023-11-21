<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{

    public function index(Request $request)
    {
        $states = State::orderBy('id','DESC')->paginate(5);
        return view('admin.states.index',compact('states'));
    }

    public function create()
    {
        $countries = Country::get();
        return view('admin.states.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:states,name',
            'country_id' => 'required|exists:countries,id',
        ]);

        $state = State::create([
            'name' => $request->input('name'),
            'country_id' => $request->input('country_id'),
        ]);
        return redirect()->route('admin.states.index')
            ->with('success','State Created Successfully');
    }


    public function edit($id)
    {
        $state = State::find($id);
        $countries = Country::get();
        return view('admin.states.edit',compact('state','countries'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $state = State::find($id);
        $state->name = $request->input('name');
        $state->save();

        return redirect()->route('admin.states.index')
            ->with('success','State updated successfully');
    }

    public function destroy($id)
    {
        \DB::table("states")->where('id',$id)->delete();
        return redirect()->route('admin.states.index')
            ->with('success','State deleted successfully');
    }
}
