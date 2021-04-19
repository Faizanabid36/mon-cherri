<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.comments',['only' => ['index']]);
        $this->middleware('permission:edit.comments',['only' => ['edit']]);
        $this->middleware('permission:delete.comments',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.comments',['only' => ['get_deleted_comments']]);
        $this->middleware('permission:restore.deleted.comments',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.comments',['only' => ['force_delete_single','force_delete_all']]);
    }

    public function index()
    {
        Comment::where('status', 0)->update(['status' => 1]);
        $comments = Comment::latest()->get();
        return view('comments.index',compact('comments'));
    }

    public function edit(Comment $comment)
    {
        $comment = Comment::findOrFail($comment->id);
        $view = view("comments.edit",compact('comment'))->render();

        return response()->json(['html'=>$view]);
    }

    public function update(Request $request, Comment $comment)
    {
         $comment = Comment::findOrFail($comment->id);
         $comment->body = $request->input('comment');
         $comment->save();
         return redirect()->route('comments.index')->with('success','Comment has been updated');
    }

    public function destroy(Comment $comment)
    {
        Comment::find($comment->id)->delete();
        return redirect()->route('comments.index')->with('success','Comment has been deleted');    
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $comments = explode(',',$request->items);
        Comment::destroy($comments);
        return redirect()->route('comments.index')->with('success','Comments have been deleted');
    }

    public function get_deleted_comments()
    {
        $deleted_comments = Comment::onlyTrashed()->get();
        return view('comments.deleted',compact('deleted_comments'));
    }
    public function restore_single($id)
    {
        Comment::where('id',$id)->restore();
        return redirect()->route('comments.deleted')->with('success','Comment have been restored');
    }
    public function restore_all()
    {
        Comment::onlyTrashed()->restore();
        return redirect()->route('comments.deleted')->with('success','Comments have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Comment::where('id',$id)->forceDelete();
        return redirect()->route('comments.deleted')->with('success','Comment have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Comment::onlyTrashed()->forceDelete();
        return redirect()->route('comments.deleted')->with('success','Comments have been deleted forever!');
    }
}
