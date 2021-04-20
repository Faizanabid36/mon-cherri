<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.cities',['only' => ['index']]);
        $this->middleware('permission:create.cities',['only' => ['store']]);
        $this->middleware('permission:edit.cities',['only' => ['edit']]);
        $this->middleware('permission:delete.cities',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.cities',['only' => ['get_deleted_cities']]);
        $this->middleware('permission:restore.deleted.cities',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.cities',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $cities = City::all();
        return view('cities.index',compact('cities'));
    }

    public function store(Request $request)
    {
        $state = State::findOrFail($request->input('state'));
        $state->cities()->create(['city_name'=>$request->input('city_name')]);
        return redirect()->route('cities.index')->with('success','City has been added!');
    }

    public function edit(City $city, Request $request)
    {
        $city = City::find($city->id);
        $view = view("cities.edit",compact('city'))->render();

        return response()->json(['html'=>$view]);
    }
    public function update(Request $request, $id)
    {
        State::findOrFail($request->input('state'));
        $city = City::findOrFail($id)->update([
            'city_name'=>$request->input('city_name'),
            'state_id'=>$request->input('state'),
        ]);
        return redirect()->route('cities.index')->with('success','City has been updated');
    }
    public function destroy($id)
    {
        City::findOrFail($id)->delete();
        return redirect()->route('cities.index')->with('success','City has been deleted');
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $cities = explode(',',$request->items);
        City::destroy($cities);
        return redirect()->route('cities.index')->with('success','Cities have been deleted');
    }

    public function get_deleted_cities()
    {
        $deleted_cities = City::onlyTrashed()->get();
        return view('cities.deleted',compact('deleted_cities'));
    }
    public function restore_single($id)
    {
        City::where('id',$id)->restore();
        return redirect()->route('cities.deleted')->with('success','City have been restored');
    }
    public function restore_all()
    {
        City::onlyTrashed()->restore();
        return redirect()->route('cities.deleted')->with('success','Cities have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        City::where('id',$id)->forceDelete();
        return redirect()->route('cities.deleted')->with('success','City have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        City::onlyTrashed()->forceDelete();
        return redirect()->route('cities.deleted')->with('success','Cities have been deleted forever!');
    }
}
