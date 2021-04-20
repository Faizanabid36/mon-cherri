<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
	public function __construct()
    {
        $this->middleware('permission:delete.images',['only' => ['delete_image']]);
    }
    public function delete_image($id)
    {
        $image = Image::find($id);
        // if(File::exists(public_path($image->url))) {
        //     File::delete(public_path($image->url));
        // }
        $image->delete();
        return back()->withInput();
    }
}
