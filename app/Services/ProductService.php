<?php

namespace App\Services;

use App\ProductPolicy;
use Image;
use DomDocument;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductService
{
    public static function upload_product($request)
    {
        $product_name = Str::lower($request->input('name'));
        $slug = Str::slug($product_name);

        $product = Product::create([
            'name' => $product_name,
            'slug' => $slug,
            'price' => $request->input('price'),
            'old_price' => $request->input('old_price'),
            'percent_off' => $request->input('percent_off'),
            'is_new' => $request->input('is_new'),
            'stock' => $request->input('stock'),
            'video' => $request->input('video_link'),
            'description' => $request->input('description'),
            'product_number' => $request->input('product_number'),
        ]);
        $product->tag($request->input('tags'));
        $product->categories()->sync($request->input('category'));
        if ($request->has('subcategory'))
            $product->subcategories()->sync($request->input('subcategory'));

        $path = 'images/product/' . $slug . '-bs_00' . $product->id;
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }

        if ($files = $request->file('images')) {
            $count = 1;
            foreach ($files as $file) {
                // image upload
                $extension = $file->extension();
                $image = $slug . $count++ . "." . $extension;
                $file->move(public_path($path), $image);
                // image insert into database
                $current_image = $product->images()->create(['url' => $path . '/' . $image]);

                // Watermark
                // $img = Image::make(public_path($current_image->url));
                // $watermark = public_path('images/brandzshop_watermark.png');
                // $img->insert($watermark, 'top',0,230);
                // $img->save(public_path($current_image->url));
            }
        }

        // $message=$request->input('description');

        // libxml_use_internal_errors(true);

        // $dom = new DomDocument();

        // $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // $images = $dom->getElementsByTagName('img');
        // foreach($images as $img){
        //     $src = $img->getAttribute('src');
        //     if(preg_match('/data:image/', $src)){
        //         // get the mimetype
        //         preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        //         $mimetype = $groups['mime'];
        //         // Generating a random filename
        //         $filename = uniqid();
        //         $filepath = $path."/".$filename.'.'.$mimetype;
        //         // encode file to the specified mimetype
        //         $image = Image::make($src)->encode($mimetype, 100)->save(public_path($filepath));
        //         $img->removeAttribute('src');
        //         $img->setAttribute('src', asset($filepath));
        //     }
        // }
        // $product->description = $dom->saveHTML();

        $product->save();

        if ($request->has('return_policy'))
            ProductPolicy::create(['product_id' => $product->id, 'policy_id' => $request->get('return_policy'), 'type' => 'Return']);

        if ($request->has('shipping_policy'))
            ProductPolicy::create(['product_id' => $product->id, 'policy_id' => $request->get('shipping_policy'), 'type' => 'Shipping']);


        return $product;
    }

    public static function update_product($request, $product)
    {
        $product = Product::find($product->id);

        $product_name = Str::lower($request->input('name'));
        $slug = Str::slug($product_name);

        $product->name = $product_name;
        $product->product_number = $request->input('product_number');
        $product->price = $request->input('price');
        $product->old_price = $request->input('old_price');
        $product->percent_off = $request->input('percent_off');
        $product->is_new = $request->input('is_new');
        $product->stock = $request->input('stock');
        $product->video = $request->input('video_link');
        $product->description = $request->input('description');

        $product->tag($request->input('tags'));
        // $product->sizes()->sync($request->input('size'));
        // $product->colors()->sync($request->input('color'));
        $product->categories()->sync($request->input('category'));
        if ($request->has('subcategory')) {
            $product->subcategories()->sync($request->input('subcategory'));
        }
        $path = 'images/product/' . $product->slug . '-bs_00' . $product->id;

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $count = 1;
            foreach ($files as $file) {
                $extension = $file->extension();
                $image = $slug . $count++ . "." . $extension;
                $file->move(public_path($path), $image);
                $product->images()->create(['url' => $path . '/' . $image]);
            }
        }

        // $message=$request->input('description');

        // libxml_use_internal_errors(true);

        // $dom = new DomDocument();

        // $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // $images = $dom->getElementsByTagName('img');
        // foreach($images as $img){
        //     $src = $img->getAttribute('src');
        //     if(preg_match('/data:image/', $src)){
        //         // get the mimetype
        //         preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        //         $mimetype = $groups['mime'];
        //         // Generating a random filename
        //         $filename = uniqid();
        //         $filepath = $path."/".$filename.'.'.$mimetype;
        //         // encode file to the specified mimetype
        //         $image = Image::make($src)->encode($mimetype, 100)->save(public_path($filepath));
        //         $img->removeAttribute('src');
        //         $img->setAttribute('src', asset($filepath));
        //     }
        // }
        // $product->description = $dom->saveHTML();

        if ($request->has('return_policy'))
        {
            $p=ProductPolicy::where('product_id', $product->id)->where('type','Return')->update(['policy_id' => $request->get('return_policy')]);
        }

        if ($request->has('shipping_policy'))
            ProductPolicy::where('product_id', $product->id)->where('type','Shipping')->update(['policy_id' => $request->get('shipping_policy')]);

        $product->save();

        return $product;
    }
}
