<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductAlbum;
use App\RotatoryImage;

use Illuminate\Http\Request;

class RotatoryImageController extends Controller
{
    public function upload_image($product_abum_id)
    {
        $images = RotatoryImage::where('product_album_id', $product_abum_id)->with('product_album')->get();
        return view('products.360_index', compact('images'));
    }

    public function update_image(Request $request, $id)
    {
        $this->validate($request, [
            'path' => 'required',
        ]);
        $imageOr = RotatoryImage::find($id);
        $image = $request->file('path');
//        $path = 'images/product_albums/images_360/' . $imageOr->id . '-gallery_0' . $imageOr->id;
//        // image upload
//        $extension = $file->extension();
//        $image = $imageOr->id . "." . $extension;
//        $file->move(public_path($path), $image);
//        // image insert into database
//        'url' => $path . '/' . $image

        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = '/images/product_albums/360/' . $imageOr->id . '-gallery_0' . $imageOr->id;
        $image->move(public_path($destinationPath), $name);
        $imageOr->path = $destinationPath . '/' . $name;
        $imageOr->save();
        return back()->with('success', 'images updated');
    }


}

