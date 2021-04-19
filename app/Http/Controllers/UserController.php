<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\BulkDeleteItemRequest;

class UserController extends Controller
{
    
     public function __construct()
    {
        $this->middleware('permission:view.users',['only' => ['index']]);
        $this->middleware('permission:create.users',['only' => ['store']]);
        $this->middleware('permission:edit.users',['only' => ['edit']]);
        $this->middleware('role:admin',['only' => ['assign_role','assign_permissions']]);
        $this->middleware('permission:delete.users',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.users',['only' => ['get_deleted_users']]);
        $this->middleware('permission:restore.deleted.users',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.users',['only' => ['force_delete_single','force_delete_all']]);
    }

    public function index()
    {
        $users = User::whereHas('roles', function($q){
            $q->where('slug', '!=', 'admin');
        })->get();
        return view('users.index',compact('users'));
    }

    public function store(Request $request)
    {
        return back();
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $this->is_notAdmin($user);
        return view('users.show',compact('user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->is_notAdmin($user);
        return view('users.edit',compact('user'));
    }
    public function update(EditProfileRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $this->is_notAdmin($user);
        $user->info()->update($request->except('_token','_method','name','image'));
        $user->name = $request->input('name');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->extension();
            $name = microtime().".".$extension;
            $file->move(public_path('images/user/'),$name);
            $user->avatar = $name;
        }
        $user->save();
        return redirect()->route('users.show',$user->id)->with('User Info has been updated');
    }
    public function assign_role(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = config('roles.models.role')::where('slug', '=', $request->input('role'))->firstOrFail();
        $user->detachAllRoles();
        $user->attachRole($role);
        return redirect()->route('users.show',$user->id)->with('success','Role ' . $role->name . ' has assigned to user');
    }
    public function assign_permissions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncPermissions($request->input('permissions'));
        return redirect()->route('users.show',$user->id)->with('success','Permissions has been assigned to user');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $this->is_notAdmin($user);
        $user->delete();
        return redirect('users')->with('success','User has been deleted');
    }
     public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $users = explode(',',$request->items);
        User::destroy($users);
        return redirect()->route('users.index')->with('success','Users have been deleted');
    }
    public function get_deleted_users()
    {
        $deleted_users = User::onlyTrashed()->get();
        return view('users.deleted',compact('deleted_users'));
    }
    public function restore_single($id)
    {
        User::where('id',$id)->restore();
        return redirect()->route('users.deleted')->with('success','User have been restored');
    }
    public function restore_all()
    {
        User::onlyTrashed()->restore();
        return redirect()->route('users.deleted')->with('success','Users have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        User::where('id',$id)->forceDelete();
        return redirect()->route('users.deleted')->with('success','User have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        User::onlyTrashed()->forceDelete();
        return redirect()->route('users.deleted')->with('success','Users have been deleted forever!');
    }
    protected function is_notAdmin($user)
    {
        if (Auth::user()->hasRole(['editor','employe']) && $user->isAdmin()) {
            return abort(404);
        }
    }
}