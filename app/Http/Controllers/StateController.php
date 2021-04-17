<?php

namespace App\Http\Controllers;

use App\State;
use App\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:view.states',['only' => ['index']]);
        $this->middleware('permission:create.states',['only' => ['store']]);
        $this->middleware('permission:edit.states',['only' => ['edit']]);
        $this->middleware('permission:delete.states',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.states',['only' => ['get_deleted_states']]);
        $this->middleware('permission:restore.deleted.states',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.states',['only' => ['force_delete_single','force_delete_all']]);
    }

    public function index()
    {
        $states = State::all();
        return view('states.index',compact('states'));
    }

    public function store(Request $request)
    {
        $country = Country::findOrFail($request->input('country'));
        $country->states()->create(['state_name'=>$request->input('state_name')]);
        return redirect()->route('states.index')->with('success','State has been added!');
    }

    public function edit(State $state, Request $request)
    {
        $state = State::findOrFail($state->id);
        $view = view("states.edit",compact('state'))->render();

        return response()->json(['html'=>$view]);
    }
    public function update(Request $request, $id)
    {
        State::findOrFail($request->input('country'));
        $state = State::findOrFail($id)->update([
            'state_name'=>$request->input('state_name'),
            'country_id'=>$request->input('country'),
        ]);
        return redirect()->route('states.index')->with('success','State has been updated');
    }
    public function destroy($id)
    {
        State::findOrFail($id)->delete();
        return redirect()->route('states.index')->with('success','State has been deleted');
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $states = explode(',',$request->items);
        State::destroy($states);
        return redirect()->route('states.index')->with('success','States have been deleted');
    }

    public function get_deleted_states()
    {
        $deleted_states = State::onlyTrashed()->get();
        return view('states.deleted',compact('deleted_states'));
    }
    public function restore_single($id)
    {
        State::where('id',$id)->restore();
        return redirect()->route('states.deleted')->with('success','State have been restored');
    }
    public function restore_all()
    {
        State::onlyTrashed()->restore();
        return redirect()->route('states.deleted')->with('success','States have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        State::where('id',$id)->forceDelete();
        return redirect()->route('states.deleted')->with('success','State have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        State::onlyTrashed()->forceDelete();
        return redirect()->route('states.deleted')->with('success','States have been deleted forever!');
    }
}
