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
        $variations=ProductVariation::whereProductId(Session::get('product_id'))->get();
        $albums=ProductAlbum::whereProductId(Session::get('product_id'))->get();
        $j=0;
        for($i=2;$i<count($collection);$i++)
        {
            $product_album = $albums->firstWhere('title',$collection[$i][2] );
            if($product_album)
            {
                $variations[$j]->album_id=$product_album->id;
            }
            else
            {
                $variations[$j]->album_id=null;
            }
            if($collection[$i][6])
                $variations[$j]->price=$collection[$i][6];
            else
                $variations[$j]->price=0;
            $variations[$j]->description=$collection[$i][7];
            if($collection[$i][8])
                $variations[$j]->qty=$collection[$i][8];
            else
                $variations[$j]->qty=0;

            if($collection[$i][9])
                $variations[$j]->weight=$collection[$i][9];
            else
            $variations[$j]->weight=0;
            $variations[$j]->save();
            $j++;
        }


    }
}
