<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductAlbum;
use App\SubCategory;
use App\Variation;
use App\ProductVariation;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\VariationRequest;
use App\Http\Requests\BulkDeleteItemRequest;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.products', ['only' => ['index']]);
        $this->middleware('permission:create.products', ['only' => ['create']]);
        $this->middleware('permission:edit.products', ['only' => ['edit']]);
        $this->middleware('permission:delete.products', ['only' => ['destroy', 'bulk_delete']]);
        $this->middleware('permission:view.deleted.products', ['only' => ['get_deleted_products']]);
        $this->middleware('permission:restore.deleted.products', ['only' => ['restore_all', 'restore_single']]);
        $this->middleware('permission:delete.forever.products', ['only' => ['force_delete_single', 'force_delete_all']]);
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {

        ProductService::upload_product($request);
        return redirect()->route('products.create')->with('success', 'Product has been uploaded successfuly');
    }

    public function show(Product $product)
    {
        return redirect('/' . $product->slug);
    }

    public function edit(Product $product)
    {
//        $product = Product::find($product->id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        ProductService::update_product($request, $product);
        return redirect()->route('products.index')->with('success', 'Product has been updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product has been deleted');
    }

    public function bulk_delete(BulkDeleteItemRequest $request)
    {
        $products = explode(',', $request->items);
        Product::destroy($products);
        return redirect()->route('products.index')->with('success', 'Products have been deleted');
    }

    public function get_deleted_products()
    {
        $deleted_products = Product::onlyTrashed()->get();
        return view('products.deleted', compact('deleted_products'));
    }

    public function restore_single($id)
    {
        Product::where('id', $id)->restore();
        return redirect()->route('products.deleted')->with('success', 'Product have been restored');
    }

    public function restore_all()
    {
        Product::onlyTrashed()->restore();
        return redirect()->route('products.deleted')->with('success', 'Products have been restored');
    }

    public function force_delete_single(Request $request, $id)
    {
        Product::where('id', $id)->forceDelete();
        return redirect()->route('products.deleted')->with('success', 'Product have been deleted forever!');
    }

    public function force_delete_all(Request $request)
    {
        Product::onlyTrashed()->forceDelete();
        return redirect()->route('products.deleted')->with('success', 'Products have been deleted forever!');
    }

    public function get_more_product_details(Request $request)
    {
        $category = Category::find($request->input('id'));
        $view = view("partials.product_create_more_detail", compact('category'))->render();
        return response()->json(['html' => $view]);
    }

    public function get_variations($product_id)
    {
        $variations = ProductVariation::whereProductId($product_id)->with('product', 'variation')->get();
        
        return view('products.variations', compact('variations', 'product_id'));
    }

    public function add_variations($product_id)
    {
        $variations = ProductVariation::whereProductId($product_id)->with('product', 'variation','certificate')->get();
       
        return view('products.create_variation', compact('product_id', 'variations'));
    }

    public function store_variations(Request $request)
    {
        //  dd($request->all());
        ProductVariation::whereProductId($request->product_id)->delete();
        foreach ($request->variations as $var) {
            if ($request->sizes) {
                foreach ($request->sizes as $size) {
                    
                    if($request->widths)
                    {
                        foreach ($request->widths as $width) {
                            if ($request->certificates) {
                        
                                foreach ($request->certificates as $certificate) {
                                   
                                    $product_variation = ProductVariation::create(
                                        [
                                            'product_id'=>$request->product_id,
                                            'variation_id'=>$var,
                                            'size_id'=>$size,
                                            'weight'=>0,
                                            'qty'=>0,
                                            'price'=>0,
                                            'description'=>"",
                                            'certificate_id'=>$certificate,
                                            'width_id'=>$width
                                        ] 
                                     );
                                    
                                }
                            }
                            else
                            {
                                
                                $product_variation = ProductVariation::create(
                                    [
                                        'product_id'=>$request->product_id,
                                        'variation_id'=>$var,
                                        'size_id'=>$size,
                                        'weight'=>0,
                                        'qty'=>0,
                                        'price'=>0,
                                        'description'=>"",
                                        'width_id'=>$width
                                    ] 
                                 );
                            }

                        }
                        
                    }
                    else if($request->certificates)
                    {
                        foreach ($request->certificates as $certificate) {
                                   
                            $product_variation = ProductVariation::create(
                                [
                                    'product_id'=>$request->product_id,
                                    'variation_id'=>$var,
                                    'size_id'=>$size,
                                    'weight'=>0,
                                    'qty'=>0,
                                    'price'=>0,
                                    'description'=>"",
                                    'certificate_id'=>$certificate
                                    
                                ] 
                             );
                            
                        }
                    }
                    else
                    {
                        $product_variation = ProductVariation::create(
                            [
                                'product_id'=>$request->product_id,
                                'variation_id'=>$var,
                                'size_id'=>$size,
                                'weight'=>0,
                                'qty'=>0,
                                'price'=>0,
                                'description'=>"",
                            ] 
                         );
                    }

                    
                    
                }

            }
        }

      
        // $product_variation=ProductVariation::create(
        //     $request->except(['_token','images'])
        // );
        // $product=Product::whereId($request->product_id)->first();
        // $path = 'images/product_variations/'.$product->slug.'-bs_00'.$product_variation->id;
        // if (! File::exists($path)) {
        //     File::makeDirectory($path);
        // }
        // if($files=$request->file('images')){
        //     $count = 1;
        //     foreach($files as $file){
        //         // image upload
        //         $extension = $file->extension();
        //         $image = $product->slug . $count++ . "." . $extension;
        //         $file->move(public_path($path),$image);
        //         // image insert into database
        //         $current_image = $product_variation->images()->create(['url'=>$path.'/'.$image]);

        //     }
        // }

        return redirect()->route('product.variations.add', $request->product_id);
    }

    public function edit_variations($id)
    {
        $product_variation = ProductVariation::whereId($id)->with('images')->first();

        return view('products.edit_variation', compact('product_variation'));
    }

    public function update_variations(VariationRequest $request)
    {
        $product_variation = ProductVariation::updateOrcreate(
            [
                'id' => $request->id
            ],
            $request->except(['_token', 'images'])
        );
        $product = Product::whereId($product_variation->product_id)->first();

        $path = 'images/product_variations/' . $product->slug . '-bs_00' . $product_variation->id;

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $count = 1;
            foreach ($files as $file) {
                $extension = $file->extension();
                $image = $product->slug . $count++ . "." . $extension;
                $file->move(public_path($path), $image);
                $product_variation->images()->create(['url' => $path . '/' . $image]);
            }
        }

        return redirect()->route('product.variations.get', $product_variation->product_id);
        // return view('products.edit_variation',compact('product_variation'));
    }

    public function edit_variation(Request $request)
    {
        $product_variation = ProductVariation::updateOrCreate(
            ['id' => $request->id],
            $request->except(['_token'])
        );
        return back();

    }

    public function destroy_variation(ProductVariation $variation)
    {
        $variation->delete();
        return back()->with('success', 'Variation has been deleted');
    }

    public function delete_variation($id)
    {
        ProductVariation::whereId($id)->delete();
        return back()->with('success', 'Variation has been deleted');
    }

    public function bulk_delete_variations(BulkDeleteItemRequest $request)
    {
        $variations = explode(',', $request->items);
        ProductVariation::destroy($variations);
        return back()->with('success', 'Variations has been deleted');
    }

    public function product_album($id)
    {
        $album = ProductAlbum::whereProductId($id)->get()->unique('title');
        $product_id = $id;
        return view('products.album_list', compact('album', 'product_id'));
    }

    public function create_album($product_id)
    {
        return view('products.create_album', compact('product_id'));
    }

    public function store_album(Request $request, $product_id)
    {
        $product = Product::whereId($product_id)->firstOrFail();
        if ($files = $request->file('images')) {
            $count = 1;
            foreach ($files as $file) {
                $album = ProductAlbum::create([
                    'title' => $request->title,
                    'product_id' => $product_id
                ]);
                $path = 'images/product_albums/' . $product->slug . '-album_0' . $album->id;
                // image upload
                $extension = $file->extension();
                $image = $product->slug . $count++ . "." . $extension;
                $file->move(public_path($path), $image);
                // image insert into database
                ProductAlbum::whereId($album->id)->update([
                    'url' => $path . '/' . $image
                ]);
            }
        }
        $album = ProductAlbum::create([
            'title' => $request->title,
            'product_id' => $product_id,
            'has_rotatory_image' => 1
        ]);
        for ($i = 1; $i <= 15; $i++) {
            \App\RotatoryImage::create(['title' => $request->title, 'path' => asset('images/defult.jpg'), 'product_album_id' => ($album->id )]);
        }
        return redirect()->route('product.album.product_album',$product_id)->withSuccess('Album Created Successfully');
    }
}
