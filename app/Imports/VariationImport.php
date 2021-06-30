<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\ProductVariation;
use Session;
class VariationImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $variations=ProductVariation::whereProductId(Session::get('product_id'))->get();

        $j=0;
        for($i=2;$i<count($collection);$i++)
        {
            if($collection[$i][7])
                $variations[$j]->price=$collection[$i][7];
            else
                $variations[$j]->price=0;
            $variations[$j]->description=$collection[$i][8];
            if($collection[$i][9])
                $variations[$j]->qty=$collection[$i][9];
            else
                $variations[$j]->qty=0;
            
            if($collection[$i][10])
                $variations[$j]->weight=$collection[$i][10];
            else
            $variations[$j]->weight=0;
            $variations[$j]->save();
            $j++;
        }
       
        
    }
}
