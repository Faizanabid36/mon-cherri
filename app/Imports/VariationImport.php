<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\ProductVariation;
use App\ProductAlbum;
use Session;

class VariationImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $variations = ProductVariation::whereProductId(Session::get('product_id'))->get();
        $albums = ProductAlbum::whereProductId(Session::get('product_id'))->get()->unique('title');
        $j = 0;
        for ($i = 2; $i < count($collection); $i++) {
            $product_album = $albums->where('title', strtolower($collection[$i][2]))->first();

            $variations[$j]->album_id = $product_album ? $product_album->id : null;

            $variations[$j]->price = $collection[$i][6] ? $collection[$i][6] : 0;

            $variations[$j]->description = $collection[$i][7];

            $variations[$j]->qty = $collection[$i][8] ? $collection[$i][8] : 0;

            $variations[$j]->weight = $collection[$i][9] ? $collection[$i][9] : 0;

            $variations[$j]->save();

            $j++;
        }

    }
}
