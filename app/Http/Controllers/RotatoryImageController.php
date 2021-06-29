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

        if (isset($request->action)) {
            $imageOr = RotatoryImage::find($id);
            $imageOr->path = url('images/defult.jpg');
            $imageOr->save();
            return back()->with('success', 'images reset');
        } else {
            $this->validate($request, [
                'path' => 'required',
            ]);
            $imageOr = RotatoryImage::find($id);
            $image = $request->file('path');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = '/images/product_albums/360/' . $imageOr->id . '-gallery_0' . $imageOr->id;
            $image->move(public_path($destinationPath), $name);
            $imageOr->path = $destinationPath . '/' . $name;
            $imageOr->save();
            return back()->with('success', 'images updated');
        }
    }


}

