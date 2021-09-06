<?php

namespace App\Http\Controllers;


use App\Certificate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.certificates',['only' => ['index']]);
        $this->middleware('permission:create.certificates',['only' => ['store']]);
        $this->middleware('permission:edit.certificates',['only' => ['edit']]);
        // $this->middleware('permission:delete.certificates',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.certificates',['only' => ['get_deleted_certificates']]);
        $this->middleware('permission:restore.deleted.certificates',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.certificates',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificates.index',compact('certificates'));
    }

   public function edit(Certificate $certificate, Request $request)
    {
        $certificate = Certificate::find($certificate->id);
        $view = view("certificates.edit",compact('certificate'))->render();

        return response()->json(['html'=>$view]);
    }
    public function store(Request $request)
    {
        $certificate = $request->input('certificate');
        Certificate::create([
            'certificate'=> $certificate,
            'slug'=>  Str::slug($certificate),
        ]);
        return back()->with('success','Certificate has been added');
    }

    public function update(Request $request, $certificate_id)
    {
        $clr           = $request->input('certificate');
        $slug          = Str::slug($clr);
        $certificate = Certificate::find($certificate_id);
        $certificate->certificate = $clr;
        $certificate->slug  =  $slug;
        $certificate->save();
        return redirect('certificates')->with('success','Certificate has been Updated');
    }
    public function destroy(Request $request, $certificate)
    {
        Certificate::find($certificate)->delete();
        return back()->with('success','Certificate has been deleted');
        // $certificate=Certificate::whereId($certificate)->with('product_variations')->first();
        // if(is_null($certificate->product_variations))
        // {
        //     $certificate->delete();
        //     return back()->with('success','Certificate has been deleted');
        // }

        // return back()->with('success','Certificate can not be deleted');
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $certificates = explode(',',$request->items);
        Certificate::destroy($certificates);
        return redirect()->route('certificates.index')->with('success','Certificate have been deleted');
    }

    public function get_deleted_certificates()
    {
        $deleted_certificates = Certificate::onlyTrashed()->get();
        return view('certificates.deleted',compact('deleted_certificates'));
    }
    public function restore_single($id)
    {
        Certificate::where('id',$id)->restore();
        return redirect()->route('certificates.deleted')->with('success','Certificate have been restored');
    }
    public function restore_all()
    {
        Certificate::onlyTrashed()->restore();
        return redirect()->route('certificates.deleted')->with('success','Certificate have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Certificate::where('id',$id)->forceDelete();
        return redirect()->route('certificates.deleted')->with('success','Certificate have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Certificate::onlyTrashed()->forceDelete();
        return redirect()->route('certificates.deleted')->with('success','Certificate have been deleted forever!');
    }
}
