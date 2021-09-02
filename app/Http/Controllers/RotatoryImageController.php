<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductAlbum;
use App\RotatoryImage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class RotatoryImageController extends Controller
{
    public function upload_image($product_abum_id)
    {
        $images = RotatoryImage::where('product_album_id', $product_abum_id)->with('product_album')->get();
        $album = ProductAlbum::whereId($product_abum_id)->with('product')->first();
        $product_id = $album->product_id;
        return view('products.360_index', compact('images', 'album', 'product_id'));
    }

    public function update_image(Request $request)
    {
        // RotatoryImage::where("product_album_id",$request->product_album_id)->delete();

        // dd();
        $path = 'images/product_albums/' . Product::whereId($request->product_id)->first()->slug . '-album_0' . $request->product_album_id . '/360_album';

        // if (! File::exists($path)) {
        //     File::makeDirectory($path);
        // }
        if (is_array($request->images) || is_object($request->images))
        {   
            foreach ($request->images as $key => $image) {
    //            dd();
    //            $file =time().'-'. $image->getClientOriginalName();
                $file = ($key + 1) . '.' . $image->getClientOriginalExtension();
                $file_path = $path . '/' . $file;
                $image->move(public_path($path), $file);
                RotatoryImage::create(
                    [
                        "path" => $file_path,
                        "product_album_id" => $request->product_album_id,
                        "title" => 'album_0' . $request->product_album_id
                    ]
                );
            }
        }
        return back()->with('success', 'images updated');

        // if (isset($request->action)) {
        //     $imageOr = RotatoryImage::find($id);
        //     $imageOr->path = url('images/defult.jpg');
        //     $imageOr->save();
        //     return back()->with('success', 'images reset');
        // } else {
        //     $this->validate($request, [
        //         'path' => 'required',
        //     ]);
        //     $imageOr = RotatoryImage::find($id);
        //     $image = $request->file('path');
        //     $name = time() . '.' . $image->getClientOriginalExtension();
        //     $destinationPath = '/images/product_albums/360/' . $imageOr->id . '-gallery_0' . $imageOr->id;
        //     $image->move(public_path($destinationPath), $name);
        //     $imageOr->path = $destinationPath . '/' . $name;
        //     $imageOr->save();
        //     return back()->with('success', 'images updated');
        // }

        // mkdir(public_path($path),0700);

    }

    public function delete_image($id)
    {
        RotatoryImage::whereId($id)->delete();
        return back();
    }


}

