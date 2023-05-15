<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarBrand;

use Services\Lp3Cargo\App\Models\CarBrand;
use Illuminate\Database\Eloquent\Collection;

/**
 * 自動車ブランドのCSVダウンロード
 */
class CsvDownload
{
    /**
     * 関数呼び出し
     * @param array $id
     * @param String $name
     * @param String $nameEn
     * @param String $order
     */
    public function __invoke(array $id = NULL, String $name = NULL, String $nameEn = NULL, $order = NULL): Collection
    {
        $builder = CarBrand::query();

        if (!is_null($id)) {
            $builder->whereIn('id', $id);
        }
        if (!is_null($name)) {
            $builder->where('name', "LIKE", "%".$name."%");
        }
        if (!is_null($nameEn)) {
            $builder->where('name_en', "LIKE", "%".$nameEn."%");
        }

        $orderArr = [
            'id' => 'id',
            'name' => 'name',
            'nameEn' => 'name_en',
        ];

        $sort = 'id';
        $orderby = 'asc';

        if (!is_null($order) && substr($order, 0, 1) != '-'){
            $sort = $orderArr[$order];
        } elseif (!is_null($order) && substr($order, 0, 1) == '-'){
            $sort = $orderArr[substr($order, 1)];// 先頭から1文字を削除
            $orderby = 'desc';
        }

        $carBrands = $builder->orderBy($sort, $orderby)->get();

        return $carBrands;
    }
}
