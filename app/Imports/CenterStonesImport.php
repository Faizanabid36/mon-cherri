<?php

namespace App\Imports;

use App\CenterStoneClarity;
use App\CenterStoneColor;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\CenterStone;

class CenterStonesImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        CenterStone::getQuery()->delete();
        CenterStoneClarity::getQuery()->delete();
        CenterStoneColor::getQuery()->delete();
        for($i=2;$i<count($collection);$i++)
        {
            CenterStoneClarity::create([
                'title'=>$collection[$i][6]
            ]);
            CenterStoneColor::create([
                'title'=>$collection[$i][5],
            ]);
            CenterStone::create(
                [
                    'diamond_id' =>$collection[$i][1],
                    'shape' =>$collection[$i][3] ,
                    'description' =>$collection[$i][2] ,
                    'center_stone_sizes' =>$collection[$i][4] ,
                    'center_stone_colors' =>$collection[$i][5] ,
                    'center_stone_clarities' =>$collection[$i][6] ,
                    'polish' =>$collection[$i][7] ,
                    'fluor' =>$collection[$i][9] ,
                    'symm' =>$collection[$i][8],
                    'lab' =>$collection[$i][10],
                    'certificate_no' =>$collection[$i][11] ,
                    'vendor_stock_no' =>$collection[$i][12] ,
                    'price_cc' =>$collection[$i][14] ,
                    'total_price' =>$collection[$i][13] ,
                    'seller' =>$collection[$i][15] ,
                    'ham_page' =>$collection[$i][16],
                ]
                );
        }
    }
}
