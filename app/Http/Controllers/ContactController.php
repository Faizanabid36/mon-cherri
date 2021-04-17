<?php
namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.messages',['only' => ['index']]);
        $this->middleware('permission:delete.messages',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.messages',['only' => ['get_deleted_messages']]);
        $this->middleware('permission:restore.deleted.messages',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.messages',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        $messages = Contact::latest()->paginate(12);
        return view('contact.index',compact('messages'));
    }
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->status = 1;
        $contact->save();
        return view('contact.show',compact('contact'));
    }
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect('messages')->with('success','Message has been delete');
    }

    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $messages = explode(',',$request->items);
        Contact::destroy($messages);
        return redirect()->route('messages.index')->with('success','Messages have been deleted');
    }

    public function get_deleted_messages()
    {
        $deleted_messages = Contact::onlyTrashed()->get();
        return view('contact.deleted',compact('deleted_messages'));
    }
    public function restore_single($id)
    {
        Contact::where('id',$id)->restore();
        return redirect()->route('messages.deleted')->with('success','Message have been restored');
    }
    public function restore_all()
    {
        Contact::onlyTrashed()->restore();
        return redirect()->route('messages.deleted')->with('success','Messages have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Contact::where('id',$id)->forceDelete();
        return redirect()->route('messages.deleted')->with('success','Message have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Contact::onlyTrashed()->forceDelete();
        return redirect()->route('messages.deleted')->with('success','Messages have been deleted forever!');
    }
}

