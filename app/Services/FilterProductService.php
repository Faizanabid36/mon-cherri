<?php

namespace App\Services;

use App\Product;
use Illuminate\Http\Request;
class FilterProductService
{
    public static function filter_with_categories($major_category,$paginate)
    {
        // dd(request());
        $products = $major_category->products()->orderBy('created_at', 'desc')->paginate($paginate);

            if(request()->hasAny(['color', 'subcategory', 'subcategory_type', 'size', 'brand', 'price_min', 'price_max', 'keyword','stone'])){

                $filters  = [];

                $products = $major_category->products()->orderBy('created_at', 'desc');

                if (request()->filled('price_min') && request()->filled('price_max')) {
                        $price_min = request()->price_min;
                        $price_max = request()->price_max;

                        $products->where('price','>=', $price_min);
                        $products->where('price','<=', $price_max);
                        $filters += ['price_min'=>$price_min,'price_max'=>$price_max];
                }
                if (request()->filled('brand')) {
                        $brand = [request()->brand];
                        $products->whereHas('brand', function($query) use ($brand) {
                        $query->whereIn('slug', $brand);
                    });
                        $filters += ['brand'=>request()->brand];
                }
                if (request()->filled('color')) {
                        $color = [request()->color];
                        $products->whereHas('colors', function($query) use ($color) {
                        $query->whereIn('slug', $color);
                    });
                        $filters += ['color'=>request()->color];
                }
                if (request()->filled('subcategory')) {
                        $subcategory = [request()->subcategory];
                        $products->whereHas('subcategories', function($query) use ($subcategory) {
                        $query->whereIn('slug', $subcategory);
                    });
                        $filters += ['subcategories'=>request()->category];
                }
                if (request()->filled('size')) {
                        $size = [request()->size];
                        $products->whereHas('sizes', function($query) use ($size) {
                        $query->whereIn('slug', $size);
                    });
                        $filters += ['size'=>request()->size];
                }

                if (request()->filled('keyword')) {
                    $keyword = request()->keyword;
                    $products->withAllTags([$keyword]);

//                    $products->orWhere('products.name', 'LIKE', '%'. $keyword .'%')
//                    ->orWhereHas('brand', function($q) use ($keyword){
//                        $q->where('title', 'LIKE', '%' . $keyword . '%');
//                    });

                    $filters += ['keyword'=>$keyword];
                }
                if (request()->filled('stone')) {
                    $stone = request()->stone;
                    $products->whereIn('products.id', function($query) use ($stone) {
                    $query->select('product_id')->from('product_stones')->where('stone_shape',$stone)->get();
                });
                    $filters += ['stone'=>request()->stone];
            }
                $products = $products->paginate($paginate)->appends($filters);
                return $products;
            }
        return $products;
    }

}
