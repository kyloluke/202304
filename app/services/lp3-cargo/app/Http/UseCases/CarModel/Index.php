<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarModel;

use Illuminate\Pagination\LengthAwarePaginator;
use Services\Lp3Cargo\App\Models\CarModel;

/**
 * 車種の一覧の取得
 */
class Index
{
    /**
     * 関数呼び出し
     * @param String $name
     * @param String $nameEn
     * @param int $carBrandId
     * @param String $carBrandName
     * @param String $carBrandNameEn
     * @param String $order
     */
    public function __invoke(String $name = NULL, String $nameEn = NULL, int $carBrandId = NULL, String $carBrandName = NULL,  String $carBrandNameEn = NULL, $order = NULL): LengthAwarePaginator
    {
        $builder = CarModel::query()->whereHas('carBrand', function ($q) {
            $q->where('car_brands.deleted_at', "=", NULL);
        });

        if (!is_null($name)) {
            $builder->where('car_models.name', "LIKE", "%".$name."%");
        }
        if (!is_null($nameEn)) {
            $builder->where('car_models.name_en', "LIKE", "%".$nameEn."%");
        }

        if (!is_null($carBrandId)) {
            $builder->where('car_brand_id', "=", $carBrandId);
        }
        if (!is_null($carBrandName)) {
            $builder->whereHas('carBrand', function ($q) use($carBrandName) {
                // car_brandsテーブルのnameで検索
                $q->where('car_brands.name', "=", $carBrandName);
            });
        }
        if (!is_null($carBrandNameEn)) {
            $builder->whereHas('carBrand', function ($q) use($carBrandNameEn) {
                // car_brandsテーブルのname_enで検索
                $q->where('car_brands.name_en', "=", $carBrandNameEn);
            });
        }

        $orderArr = [
            'id' => 'id',
            'name' => 'name',
            'nameEn' => 'name_en',
            'carBrandId' => 'car_brand_id',
            'carBrandName' => 'car_brands.name',
            'carBrandNameEn' => 'car_brands.name_en',
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

        $carModels = $builder->select('car_models.*')->join('car_brands', 'car_brands.id', '=', 'car_brand_id')->orderBy($sort, $orderby)->paginate();

        return $carModels;
    }
}
