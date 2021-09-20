<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Size;
use App\Color;
use App\Brand;
use App\Category;
use App\RotatoryImage;
use App\Variation;
use App\ProductAlbum;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Product extends Model
{
    // use SoftDeletes;

    use Rateable;
    use \Conner\Tagging\Taggable;

    protected $fillable = [
        'name', 'product_number', 'slug', 'price', 'metal', 'prong_metal', 'width', 'description', 'old_price', 'percent_off', 'is_new', 'stock', 'video',
    ];

    protected static function boot() {
        parent::boot();
    
        static::deleting(function($product) {

            foreach($product->images()->get() as $image)
            {
                File::delete($image->url);
            }
            $product->images()->delete();
            $product->product_variations()->delete();
            $product->reviews()->delete();
            $product->product_variations()->delete();
            $productAlbums=ProductAlbum::whereProductId($product->id)->get();
            foreach($productAlbums as $album)
            {
                File::delete($album->url);
            }
            ProductAlbum::whereProductId($product->id)->delete();
            
        });
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function subcategories()
    {
        return $this->belongsToMany('App\SubCategory');
    }
    // public function brand()
    // {
    //     return $this->belongsTo('App\Brand');
    // }
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function rotatory_images()
    {
        return $this->hasMany('App\RotatoryImage');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function FormatedPrice()
    {
        if ($this->price) {
            return currency($this->price, 'USD', currency()->getUserCurrency());
        }
        return '';
    }

    public function FormatedOldPrice()
    {
        if ($this->old_price) {
            return currency($this->old_price, 'USD', currency()->getUserCurrency());
        }
        return '';
    }

    public function variations()
    {
        return $this->belongsToMany('App\Variation', 'product_variations', 'product_id', 'variation_id');
    }

    public function product_variations()
    {
        return $this->hasMany('App\ProductVariation', 'product_id', 'id');
    }

    public function product_stones()
    {
        return $this->hasMany(ProductStone::class);
    }

}
