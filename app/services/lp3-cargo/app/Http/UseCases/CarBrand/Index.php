<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarBrand;

use Illuminate\Pagination\LengthAwarePaginator;
use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * 自動車ブランドの一覧の取得
 */
class Index
{
    /**
     * 関数呼び出し
     * @param String $name
     * @param String $nameEn
     * @param String $order
     */
    public function __invoke(String $name = NULL, String $nameEn = NULL, $order = NULL): LengthAwarePaginator
    {
        $builder = CarBrand::query();

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
            'updatedBy' => 'updated_by',
            'createdBy' => 'created_by',
            'updatedAt' => 'updated_at',
            'createdAt' => 'created_at',
        ];

        $sort = 'id';
        $orderby = 'asc';

        if (!is_null($order) && substr($order, 0, 1) != '-'){
            $sort = $orderArr[$order];
        } elseif (!is_null($order) && substr($order, 0, 1) == '-'){
            $sort = $orderArr[substr($order, 1)];// 先頭から1文字を削除
            $orderby = 'desc';
        }

        $carBrands = $builder->orderBy($sort, $orderby)->paginate();

        return $carBrands;
    }
}
