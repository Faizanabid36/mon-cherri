<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policy;

class PolicyController extends Controller
{
    public function get_policies(Request $request,$type=null)
    {
        if(!$type)
        {
            $type="Return";
        }
        $policies= Policy::whereType($type)->get();
        return view('policy.show',compact('policies','type'));
    }
    // public function get_policy_by_type($type)
    // {
    //     $policies= Policy::whereType($type)->all();
    //     return view('policy.show',compact('policies'));
    // }
    
    public function add_policy(Request $request)
    {
        return view('policy.add');
    }
    public function store_policy(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'days' => 'required|numeric',
        ]);
        Policy::updateOrCreate(
            ['id'=>$request->id],
            $request->except('_token')
        );
        return redirect()->route('policy.show');
    }
    public function delete_policy($id)
    {
        Policy::whereId($id)->delete();
        return redirect()->route('policy.show');
    }
    public function edit_policy($id)
    {
        $policy=Policy::whereId($id)->first();
        return view('policy.add',compact('policy'));
    }
    public function mark_policy($id,$type)
    {
        Policy::whereType($type)->update(
            ['is_default'=>false]
        );
        Policy::whereId($id)->update(
            ['is_default'=>true]
        );
        return back();
    }
}
