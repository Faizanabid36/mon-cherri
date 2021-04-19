<?php

namespace App\Http\Controllers;

use App\Post;
use App\Services\PostService;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;
use App\Http\Requests\BulkDeleteItemRequest;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view.posts',['only' => ['index']]);
        $this->middleware('permission:create.posts',['only' => ['create']]);
        $this->middleware('permission:edit.posts',['only' => ['edit']]);
        $this->middleware('permission:delete.posts',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.posts',['only' => ['get_deleted_posts']]);
        $this->middleware('permission:restore.deleted.posts',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.posts',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        return view('posts.index',['posts'=>Post::orderBy('id', 'DESC')->get()]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request)
    {
        PostService::create($request);
        return redirect()->route('posts.index')->with('success','Post has been Created');
    }


    public function show(Post $post)
    {
        return redirect('post/'.$post->slug);
    }

    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request, Post $post)
    {
        PostService::update($request,$post);
        return redirect()->route('posts.index')->with('success','Post has been Updated');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post has been Deleted');
    }

    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $posts = explode(',',$request->items);
        Post::destroy($posts);
        return redirect()->route('posts.index')->with('success','Posts have been deleted');
    }

    public function get_deleted_posts()
    {
        $deleted_posts = Post::onlyTrashed()->get();
        return view('posts.deleted',compact('deleted_posts'));
    }
    public function restore_single($id)
    {
        Post::where('id',$id)->restore();
        return redirect()->route('posts.deleted')->with('success','Post have been restored');
    }
    public function restore_all()
    {
        Post::onlyTrashed()->restore();
        return redirect()->route('posts.deleted')->with('success','Posts have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Post::where('id',$id)->forceDelete();
        return redirect()->route('posts.deleted')->with('success','Post have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Post::onlyTrashed()->forceDelete();
        return redirect()->route('posts.deleted')->with('success','Posts have been deleted forever!');
    }
}
