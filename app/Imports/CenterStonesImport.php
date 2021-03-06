<?php

namespace App\Imports;

use App\CenterStoneClarity;
use App\CenterStoneColor;
use App\CenterStoneSize;
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
//        CenterStoneClarity::getQuery()->delete();
//        CenterStoneColor::getQuery()->delete();
//        CenterStoneSize::getQuery()->delete();
        $colors = $clarities = $sizes = [];
        for ($i = 2; $i < count($collection); $i++) {
            if (!in_array($collection[$i][4], $colors))
                array_push($colors, $collection[$i][4]);

            if (!in_array($collection[$i][5], $clarities))
                array_push($clarities, $collection[$i][5]);

            if (!in_array($collection[$i][3], $sizes))
                array_push($sizes, $collection[$i][3]);

            CenterStone::create(
                [
                    'diamond_id' => $collection[$i][0],
                    'shape' => $collection[$i][2],
                    'description' => $collection[$i][1],
                    'center_stone_sizes' => $collection[$i][3],
                    'center_stone_colors' => $collection[$i][4],
                    'center_stone_clarities' => $collection[$i][5],
                    'cut' => $collection[$i][6],
                    'polish' => $collection[$i][7],
                    'fluor' => $collection[$i][9],
                    'symm' => $collection[$i][8],
                    'lab' => $collection[$i][10],
                    'certificate_no' => $collection[$i][11],
                    'vendor_stock_no' => $collection[$i][12],
                    'price_cc' => $collection[$i][13],
                    'total_price' => $collection[$i][14],
                    'seller' => "",
                    'ham_page' => "",
                ]
            );
        }
        foreach ($colors as $color) {
            try {
                CenterStoneColor::create([
                    'title' => $color,
                ]);
            } catch (\Exception $exception) {
            }
        }

        foreach ($clarities as $clarity) {
            try {
                CenterStoneClarity::create([
                    'title' => $clarity,
                ]);
            } catch (\Exception $exception) {
            }
        }

        foreach ($sizes as $size)
            try {
                CenterStoneSize::create([
                    'title' => $size,
                ]);
            }catch(\Exception $exception){}
    }
}
