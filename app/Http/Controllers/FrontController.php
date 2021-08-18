<?php

namespace App\Http\Controllers;

use App\Category;
use App\CenterStone;
use App\CenterStoneClarity;
use App\CenterStoneColor;
use App\CenterStoneSize;
use App\Invoice;
use App\Post;
use App\Product;
use App\ProductStone;
use App\ProductVariation;
use App\ProductAlbum;
use App\Variation;
use App\Width;
use App\RotatoryImage;
use App\Services\FilterProductService;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontController extends Controller
{

    public function index()
    {
        $latest_products = Product::with(['images', 'image'])->latest()->limit(10)->get();
//        $latest_posts = Post::with('image')->latest()->limit(3)->get();
        $latest_posts = [];
        $latest_product_ids = $latest_products->pluck('id');
        $our_products = Product::with(['images', 'image'])->whereNotIn('id', $latest_product_ids)->take(10)->get();
        return view('pages.index', compact('latest_products', 'latest_posts', 'our_products'));
    }

    public function products()
    {

        $major_category = Category::where('slug', '=', request()->slug)->firstOrFail();

        // 2nd param paginate product
        $products = FilterProductService::filter_with_categories($major_category, 12);
        return view('pages.products', compact('products', 'major_category'));
    }

    public function show_product($slug)
    {
        $product = Product::where('slug', $slug)->with('product_variations')->firstOrFail();
        $product_widths = $product_sizes = $related_products =$stones = [];
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
        return view('pages.show', compact('product', 'related_products', 'product_variations', 'product_sizes', 'product_widths', 'stones'));
    }

    public function getStones($product_stone, $stones)
    {
        $stone_sizes = CenterStoneSize::where([
            ['title', '>=', $product_stone->size_from],
            ['title', '<=', $product_stone->size_to]
        ])->orderBy('title')->get();
        $starting_clarity = CenterStoneClarity::find($product_stone->clarity_from);
        $ending_clarity = CenterStoneClarity::find($product_stone->clarity_to);
        $stone_clarities = CenterStoneClarity::where([
            ['priority', '>=', $starting_clarity->priority],
            ['priority', '<=', $ending_clarity->priority]
        ])->orderBy('priority')->get();
//        dd($stone_clarities);
        $starting_color = CenterStoneColor::find($product_stone->color_from);
        $ending_color = CenterStoneColor::find($product_stone->color_to);
        $stone_colors = CenterStoneColor::where([
            ['priority', '>=', $starting_color->priority],
            ['priority', '<=', $ending_color->priority]
        ])->orderBy('priority')->get();
        foreach ($stone_sizes as $size) {
            foreach ($stone_clarities as $clarity) {
                foreach ($stone_colors as $color) {
                    $stone = CenterStone::whereShape($product_stone->stone_shape)
                        ->whereCenterStoneSizes($size->title)->whereCenterStoneClarities($clarity->title)->whereCenterStoneColors($color->title)->first();
                    if (!is_null($stone)) {
//                        echo 'asd';
                        $stones[] = $stone;
                    }
                }
            }
        }
        return $stones;
    }

    public function blog()
    {
        return view('pages.blog', ['posts' => Post::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        views($post)->cooldown(now()->addHours(1))->record();
        session()->flash('after_login_url', '/post/' . $post->slug);
        return view('pages.post', compact('post'));
    }

    public function help()
    {
        return view('pages.help');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function privacy_policy()
    {
        return view('pages.privacy_policy');
    }

    public function sitemap()
    {
        return view('pages.sitemap');
    }

    public function customer_dashboard()
    {
        return view('pages.account');
    }

    public function customer_orders()
    {
        return view('pages.orders');
    }

    public function customer_setting()
    {
        return view('pages.settings');
    }

    public function checkout()
    {

        session()->put('after_login_url', url('/checkout'));

        if (!Cart::count() > 0) {
            return redirect('/cart');
        }
        foreach (Cart::content() as $row) {
            if (!$row->options->size) {
                return redirect('/cart')->with('danger', 'Please select size of product');
            }
        }
        return view('pages.checkout');
    }

    public function customer_invoice($invoice_no)
    {
        $invoice = Invoice::where('invoice_no', '=', $invoice_no)->firstOrFail();
        if ($invoice->user->id == Auth::user()->id) {
            return view('pages.invoice', compact('invoice'));
        }
        return abort(404);
    }

    //Owais

    public function ChangeAlbum(request $request)
    {
        $product = Product::where('slug', $request->product_id)->firstOrFail();
        $stones = [];
        foreach ($product->product_stones as $product_stone) {
            $stones = $this->getStones($product_stone, $stones);
        }
        // dd($stones);
        if(!$request->psize && !$request->pwidth){
            $product_variations = ProductVariation::where([['product_id', $product->id],['variation_id', $request->provar]])->firstOrFail();
           }
           else if(!$request->pwidth){
            $product_variations = ProductVariation::where([['product_id', $product->id], ['size_id', $request->psize], ['variation_id', $request->provar]])->firstOrFail();
           }
           else if(!$request->psize){
            $product_variations = ProductVariation::where([['product_id', $product->id],['width_id', $request->pwidth], ['variation_id', $request->provar]])->firstOrFail();
           }
           else{
            $product_variations = ProductVariation::where([['product_id', $product->id], ['size_id', $request->psize], ['width_id', $request->pwidth], ['variation_id', $request->provar]])->firstOrFail();
           }
        if ($product_variations->price == '0.00') {
            $product_variations->price = $product->price;
        }
        if ($product_variations->description == null) {
            $product_variations->description = $product->description;
        }
        $variations = Variation::where('id', $product_variations->variation_id)->firstOrFail();
        if ($variations->title == null)
            $variations->title = $product->prong_metal;
        if ($variations->sub_title == null)
            $variations->sub_title = $product->metal;
        if ($product_variations->width_id == null) {
            if ($product->width != null)
                $width = $product->width;
            else
                $width = '';
        } else {
            $width = Width::where('id', $product_variations->width_id)->get();
        }
        if ($product_variations->album_id == null) {
            foreach ($product->images as $p_img) {
                $images[] = $p_img;
            }

            $rotateimages = '';
            $countRimages = '';

        } else {
            $gettitle = ProductAlbum::where('id', $product_variations->album_id)->get();
            $images = ProductAlbum::where([['title', $gettitle[0]->title], ['url', '!=', 'Null']])->get('url');
            $rotateimagesid = ProductAlbum::where([['title', $gettitle[0]->title], ['has_rotatory_image', '1']])->get('id');
            $rotateimages = RotatoryImage::where('product_album_id', $rotateimagesid[0]->id)->get('path');
            $countRimages = count($rotateimages);
        }
        return array($images, $product_variations, $rotateimages, $countRimages, $variations, $width, $stones);
    }
}
