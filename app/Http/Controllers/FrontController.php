<?php

namespace App\Http\Controllers;

use App\Category;
use App\Invoice;
use App\Post;
use App\Product;
use App\ProductVariation;
use App\ProductAlbum;
use App\Services\FilterProductService;
use Auth;
use Cart;
use Illuminate\Http\Request;

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
        $product_variations = collect($product->product_variations)->unique(function ($var) {
            return $var['product_id'] . $var['variation_id'];;
        });
        $product_sizes = collect($product->product_variations)->unique(function ($var) {
            return $var['product_id'] . $var['size_id'];;
        });
        $product_widths = collect($product->product_variations)->unique(function ($var) {
            return $var['product_id'] . $var['width_id'];;
        });
        $related_products = Product::where('id', '!=', $product->id)->limit(8)->latest()->get();
        session()->flash('after_login_url', '/' . $product->slug);
        return view('pages.show', compact('product', 'related_products', 'product_variations', 'product_sizes', 'product_widths'));
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
        $product_variations = ProductVariation::where([['product_id', $product->id],['size_id',$request->psize],['width_id',$request->pwidth],['variation_id',$request->provar]])->firstOrFail();
        $gettitle = ProductAlbum::where('id',$product_variations->album_id)->firstOrFail();
        $images = ProductAlbum::where([['title',$gettitle->title],['url' , '!=', 'null']])->get('url');
        return array($images,$product_variations->price);
    }
}
