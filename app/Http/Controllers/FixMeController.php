<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Services\FilterProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FixMeController extends Controller
{
    public function index()
    {
        $latest_products = Product::with(['images', 'image'])->latest()->limit(10)->get();
        // $latest_product_ids = $latest_products->pluck('id');
        // $our_products = Product::with(['images', 'image'])->whereNotIn('id', $latest_product_ids)->take(10)->get();
        $latest_posts = [];
        $latest_product_ids = $latest_products->pluck('id');
        $our_products = Product::with(['images', 'image'])->whereNotIn('id', $latest_product_ids)->take(10)->get();
        
        return view('moncheri.index', compact('latest_products', 'latest_posts', 'our_products'));
    }

    public function products()
    {

        $major_category = Category::where('slug', '=', request()->slug)->firstOrFail();
        // 2nd param paginate product
        $products = FilterProductService::filter_with_categories($major_category, 12);
        return view('moncheri.products', compact('products', 'major_category'));
    }

    public function show_product($slug)
    {
        $product = Product::where('slug', $slug)->with('product_variations')->firstOrFail();
        $product_widths = $product_sizes = $related_products = $stones = [];
        $product_variations = collect($product->product_variations)->unique(function ($var) {
            return $var['product_id'] . $var['variation_id'];
        });
        if (isset($product->product_variations[0]) && $product->product_variations[0]->size_id != 0) {
            $product_sizes = collect($product->product_variations)->unique(function ($var) {
                return $var['product_id'] . $var['size_id'];;
            });
        }
        if (isset($product->product_variations[0]) && $product->product_variations[0]->width_id) {
            $product_widths = collect($product->product_variations)->unique(function ($var) {
                return $var['product_id'] . $var['width_id'];;
            });
        }
        $related_products = Cache::remember($slug . '-related', '99999', function () use ($product) {
            return Product::where('id', '!=', $product->id)->limit(8)->latest()->get();
        });
        foreach ($product->product_stones as $product_stone) {
            $stones = $this->getStones($product_stone, $stones);
        }
        session()->flash('after_login_url', '/' . $product->slug);
        return view('moncheri.product', compact('product', 'related_products', 'product_variations', 'product_sizes', 'product_widths', 'stones'));
    }
}
