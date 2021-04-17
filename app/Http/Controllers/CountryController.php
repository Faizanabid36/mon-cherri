<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:view.countries',['only' => ['index']]);
        $this->middleware('permission:create.countries',['only' => ['store']]);
        $this->middleware('permission:edit.countries',['only' => ['edit']]);
        $this->middleware('permission:delete.countries',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.countries',['only' => ['get_deleted_countries']]);
        $this->middleware('permission:restore.deleted.countries',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.countries',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $countries = Country::all();
        return view('countries.index',compact('countries'));
    }

    public function store(Request $request)
    {
        Country::create(['country_name'=>$request->input('country_name')]);
        return redirect()->route('countries.index')->with('success','Country has been added!');
    }

    public function edit(Country $country, Request $request)
    {
        $country = Country::findOrFail($country->id);
        $view = view("countries.edit",compact('country'))->render();

        return response()->json(['html'=>$view]);
    }
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id)->update(['country_name'=>$request->input('country_name'),]);
        return redirect()->route('countries.index')->with('success','Country has been updated');
    }
    public function destroy($id)
    {
        Country::findOrFail($id)->delete();
        return redirect()->route('countries.index')->with('success','Country has been deleted');
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $countries = explode(',',$request->items);
        Country::destroy($countries);
        return redirect()->route('countries.index')->with('success','Countries have been deleted');
    }

    public function get_deleted_countries()
    {
        $deleted_countries = Country::onlyTrashed()->get();
        return view('countries.deleted',compact('deleted_countries'));
    }
    public function restore_single($id)
    {
        Country::where('id',$id)->restore();
        return redirect()->route('countries.deleted')->with('success','Country have been restored');
    }
    public function restore_all()
    {
        Country::onlyTrashed()->restore();
        return redirect()->route('countries.deleted')->with('success','Countries have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Country::where('id',$id)->forceDelete();
        return redirect()->route('countries.deleted')->with('success','Country have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Country::onlyTrashed()->forceDelete();
        return redirect()->route('countries.deleted')->with('success','Countries have been deleted forever!');
    }
}
