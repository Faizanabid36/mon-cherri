<?php

namespace App\Http\Controllers;

use App\Category;
use App\CenterStone;
use App\CenterStoneClarity;
use App\CenterStoneColor;
use App\CenterStoneSize;
use App\Http\Requests\BulkDeleteItemRequest;
use App\Http\Requests\ProductRequest;
use App\Imports\VariationImport;
use App\Policy;
use App\Product;
use App\ProductAlbum;
use App\ProductStone;
use App\ProductVariation;
use App\Services\ProductService;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Session;
use function foo\func;


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
        $products = Cache::remember('stones', 15, function () {
            return Product::latest()->get();
        });
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $policies = Policy::all();
        $return_policies = $policies->where('type', 'Return');
        $shipping_policies = $policies->where('type', 'Shipping');
        return view('products.create', compact('return_policies', 'shipping_policies'));
    }

    public function store(ProductRequest $request)
    {
        // dd($request->all());
        $product = ProductService::upload_product($request);
        return redirect()->route('products.edit', $product->id)->with('success', 'Product has been uploaded successfuly');
    }

    public function show(Product $product)
    {
        return redirect('/' . $product->slug);
    }

    public function edit(Product $product)
    {
        $policies = Policy::all();
        $return_policies = $policies->where('type', 'Return');
        $shipping_policies = $policies->where('type', 'Shipping');
        return view('products.edit', compact('product', 'return_policies', 'shipping_policies'));
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

        $variations = ProductVariation::whereProductId($product_id)->with('product', 'variation', 'certificate', 'album')->get();
        $product = Product::whereId($product_id)->first();
        return view('products.create_variation', compact('product_id', 'variations', 'product'));
    }

    public function store_variations(Request $request)
    {
        ProductVariation::whereProductId($request->product_id)->delete();
        $product = Product::whereId($request->product_id)->first();
        $product->variations = json_encode($request->variations);
        $product->sizes = json_encode($request->sizes);
        $product->widths = json_encode($request->widths);
        $product->save();
        foreach ($request->variations as $var) {
            if ($request->sizes) {
                foreach ($request->sizes as $size) {
                    if ($request->widths) {
                        foreach ($request->widths as $width) {

                            if ($request->certificates) {

                                foreach ($request->certificates as $certificate) {

                                    $product_variation = ProductVariation::create(
                                        [
                                            'product_id' => $request->product_id,
                                            'variation_id' => $var,
                                            'size_id' => $size,
                                            'weight' => 0,
                                            'qty' => 0,
                                            'price' => 0,
                                            'description' => "",
                                            'certificate_id' => $certificate,
                                            'width_id' => $width
                                        ]
                                    );

                                }
                            } else {

                                $product_variation = ProductVariation::create(
                                    [
                                        'product_id' => $request->product_id,
                                        'variation_id' => $var,
                                        'size_id' => $size,
                                        'weight' => 0,
                                        'qty' => 0,
                                        'price' => 0,
                                        'description' => "",
                                        'width_id' => $width
                                    ]
                                );
                            }

                        }

                    } else if ($request->certificates) {
                        foreach ($request->certificates as $certificate) {

                            $product_variation = ProductVariation::create(
                                [
                                    'product_id' => $request->product_id,
                                    'variation_id' => $var,
                                    'size_id' => $size,
                                    'weight' => 0,
                                    'qty' => 0,
                                    'price' => 0,
                                    'description' => "",
                                    'certificate_id' => $certificate

                                ]
                            );

                        }
                    } else {
                        $product_variation = ProductVariation::create(
                            [
                                'product_id' => $request->product_id,
                                'variation_id' => $var,
                                'size_id' => $size,
                                'weight' => 0,
                                'qty' => 0,
                                'price' => 0,
                                'description' => "",
                            ]
                        );
                    }
                }

            } else {
                if ($request->widths) {
                    foreach ($request->widths as $width) {

                        if ($request->certificates) {

                            foreach ($request->certificates as $certificate) {

                                $product_variation = ProductVariation::create(
                                    [
                                        'product_id' => $request->product_id,
                                        'variation_id' => $var,
                                        'size_id' => 0,
                                        'weight' => 0,
                                        'qty' => 0,
                                        'price' => 0,
                                        'description' => "",
                                        'certificate_id' => $certificate,
                                        'width_id' => $width
                                    ]
                                );

                            }
                        } else {

                            $product_variation = ProductVariation::create(
                                [
                                    'product_id' => $request->product_id,
                                    'variation_id' => $var,
                                    'size_id' => 0,
                                    'weight' => 0,
                                    'qty' => 0,
                                    'price' => 0,
                                    'description' => "",
                                    'width_id' => $width
                                ]
                            );
                        }

                    }

                } else {
                    $product_variation = ProductVariation::create(
                        [
                            'product_id' => $request->product_id,
                            'variation_id' => $var,
                            'size_id' => 0,
                            'weight' => 0,
                            'qty' => 0,
                            'price' => 0,
                            'description' => "",
                        ]
                    );
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

    public function edit_variations(Request $request)
    {
        $product_variation = ProductVariation::whereId($request->id)->first();

        return response()->json($product_variation);
    }

    // public function update_variations(VariationRequest $request)
    // {
    //     $product_variation = ProductVariation::updateOrcreate(
    //         [
    //             'id' => $request->id
    //         ],
    //         $request->except(['_token', 'images'])
    //     );
    //     $product = Product::whereId($product_variation->product_id)->first();

    //     $path = 'images/product_variations/' . $product->slug . '-bs_00' . $product_variation->id;

    //     if ($request->hasFile('images')) {
    //         $files = $request->file('images');
    //         $count = 1;
    //         foreach ($files as $file) {
    //             $extension = $file->extension();
    //             $image = $product->slug . $count++ . "." . $extension;
    //             $file->move(public_path($path), $image);
    //             $product_variation->images()->create(['url' => $path . '/' . $image]);
    //         }
    //     }

    //     return redirect()->route('product.variations.get', $product_variation->product_id);
    //     // return view('products.edit_variation',compact('product_variation'));
    // }

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
        $product = Product::whereId($id)->firstOrFail();
        $album = ProductAlbum::whereProductId($id)->get()->unique('title');
        $product_id = $id;
        return view('products.album_list', compact('album', 'product_id'));
    }

    public function center_stone($product_id)
    {
        $product = Product::whereId($product_id)->firstOrFail();
        $stone_sizes = CenterStoneSize::orderBy('title')->get();
        $stone_clarities = CenterStoneClarity::orderBy('priority')->get();
        $stone_colors = CenterStoneColor::orderBy('priority')->get();
        $stone_shapes = CenterStone::get()->pluck('shape')->unique();
        $product_stones = ProductStone::whereProductId($product_id)->get();
        return view('products.add_stones', compact('product_id', 'stone_clarities', 'stone_sizes', 'stone_colors', 'stone_shapes', 'product_stones'));
    }

    public function store_center_stone(Request $request)
    {
        ProductStone::create($request->except('_token'));
        return back()->withSuccess('Created Successfully');
    }

    public function delete_center_stone(Request $request)
    {
        ProductStone::destroy($request->ids);
        return back();

    }

    public function OLDstore_center_stone(Request $request)
    {
        ProductStone::whereProductId($request->product_id)->whereStoneShape($request->stone_shape)->delete();
        $stone_sizes = CenterStoneSize::where([
            ['id', '>=', $request->size_from],
            ['id', '<=', $request->size_to]
        ])
            ->orderBy('title')->get();
        $stone_clarities = CenterStoneClarity::where([
            ['id', '>=', $request->clarity_from],
            ['id', '<=', $request->clarity_to]
        ])
            ->orderBy('priority')->get();
        $stone_colors = CenterStoneColor::where([
            ['id', '>=', $request->color_from],
            ['id', '<=', $request->color_to]
        ])
            ->orderBy('priority')->get();
        foreach ($stone_sizes as $size) {
            foreach ($stone_clarities as $clarity) {
                foreach ($stone_colors as $color) {
                    $stone = CenterStone::whereShape($request->stone_shape)
                        ->whereCenterStoneSizes($size->title)->whereCenterStoneClarities($clarity->title)->whereCenterStoneColors($color->title)->first();
                    if (!is_null($stone))
                        ProductStone::create([
                            'stone_shape' => $request->stone_shape,
                            'product_id' => $request->product_id,
                            'color_id' => $color->id,
                            'clarity_id' => $clarity->id,
                            'size_id' => $size->id
                        ]);
                }
            }
        }
        //  ProductStone::create($request->except('_token'));
        return back()->withSuccess('Created Successfully');
    }

    public function create_album($product_id)
    {
        $product = Product::find($product_id);
        return view('products.create_album', compact('product_id', 'product'));
    }

    public function edit_album($product_album_id, $title)
    {
        $product_album_all = ProductAlbum::whereProductId($product_album_id)->whereTitle($title)->with('product')->get();
        $product_album = collect($product_album_all)->map(function ($alb) {
            if ($alb->url)
                return $alb;
        })->filter(function ($a) {
            return $a != null;
        });
        $id_360 = collect($product_album_all)->filter(function ($al) {
            return $al->has_rotatory_image != null;
        })->first();
        dd($product_album_all, $product_album, $id_360);
        $product = $product_album->first()->product;
        $product_id = $product->id;

        return view('products.create_album', compact('product_album_id', 'product_id', 'product', 'product_album', 'id_360'));
    }

    public function store_album(Request $request, $product_id)
    {
        $product = Product::whereId($product_id)->firstOrFail();
        if ($files = $request->file('images')) {
            $count = 1;
            foreach ($files as $file) {
                $album = ProductAlbum::create([
                    'title' => strtolower($request->title),
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
            'title' => strtolower($request->title),
            'product_id' => $product_id,
            'has_rotatory_image' => 1
        ]);
        // for ($i = 1; $i <= 15; $i++) {

        //     \App\RotatoryImage::create(['title' => $request->title, 'path' => url('images/defult.jpg'), 'product_album_id' => ($album->id)]);
        // }
        return redirect()->route('product.album.product_album', $product_id)->withSuccess('Album Created Successfully');
    }

    public function delete_image_album($id)
    {
        ProductAlbum::whereId($id)->delete();
        return back();
    }

    public function import_csv(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx,csv'
        ]);
//        $path = $request->file('file')->getRealPath();

        $file = $request->file('file');
        $path = 'images/sheet';
        // image upload
        $extension = $file->extension();
        $image = time() . '.' . $extension;
        $file->move(public_path($path), $image);
        Session::put('product_id', $request->product_id);
        $url = $path . '/' . $image;
        Excel::import(new VariationImport, $url);
        return back()->with('success', 'Variations has been updated');
    }
}
