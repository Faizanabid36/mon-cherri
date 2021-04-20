<?php 
namespace App\Services;
use Auth;
use App\Post;
use Illuminate\Http\Request;
class CommentService 
{
	public static function store($request,$id)
    {
        $post = Post::findOrFail($id);

        $comment = $post->comments()->create([
            'body'    =>$request->input('comment'),
            'user_id'   => Auth::user()->id,
        ]);
        return $comment;
    }
}