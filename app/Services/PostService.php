<?php 
namespace App\Services;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostService 
{
	public static function create($request)
	{	$title = Str::lower($request->input('title'));
		$slug = Str::slug($title);
		$post = Post::create([
			'title'=>$title,
			'content'=>$request->input('content'),
            'slug'=>$slug,
            'user_id'=>Auth::user()->id,
		]);
		if($file=$request->file('image')){
			$path = 'images/blog/';
            $extension = $file->extension();
            $image = $slug.".".$extension;
            $file->move(public_path($path),$image);
            $banner = $path.'/'.$image;
        }else{
            $banner = $path.'/brandzshop_banner.jpg';
        }
		$post->image()->create(['url'=>$banner]);
		return $post;
	}
	public static function update($request,$post)
	{
		$title = Str::lower($request->input('title'));
		$slug = Str::slug($title);

		$post = Post::find($post->id);
		$post->title 	=	$title;
		$post->slug 	=	$slug;
		$post->content 	=  	$request->input('content');

		if($file=$request->file('image')){
				$path = 'images/blog/';
                $extension = $file->extension();
                $image = $slug.".".$extension;
                $file->move(public_path($path),$image);
                $banner = $path.'/'.$image;
                $image = $post->image()->update(['url'=>$banner]);
        }
        $post->save();
		return $post;
	}
}