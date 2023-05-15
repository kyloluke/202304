<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarModel;

use Services\Lp3Cargo\App\Models\CarModel;
use Illuminate\Database\Eloquent\Collection;

/**
 * 複数車種のCSVのエクスポート
 */
class CsvDownload
{
    /**
     * 関数呼び出し
     * @param array $id
     * @param String $name
     * @param String $nameEn
     * @param int $carBrandId
     * @param String $carBrandName
     * @param String $carBrandNameEn
     * @param String $order
     */
    public function __invoke(array $id = NULL, String $name = NULL, String $nameEn = NULL, int $carBrandId = NULL, String $carBrandName = NULL, String $carBrandNameEn = NULL, $order = NULL): Collection
    {
        $query = CarModel::query()->whereHas('carBrand', function ($q) {
            $q->where('car_brands.deleted_at', "=", NULL);
        });

        if (!is_null($id)) {
            $query->whereIn('car_models.id', $id);
        }
        if (!is_null($name)) {
            $query->where('car_models.name', "LIKE", "%".$name."%");
        }
        if (!is_null($nameEn)) {
            $query->where('car_models.name_en', "LIKE", "%".$nameEn."%");
        }

        if (!is_null($carBrandId)) {
            $query->where('car_models.car_brand_id', "=", $carBrandId);
        }
        if (!is_null($carBrandName)) {
            $query->whereHas('carBrand', function ($q) use($carBrandName) {
                // car_brandsテーブルのnameで検索
                $q->where('car_brands.name', "LIKE", "%".$carBrandName."%");
            });
        }
        if (!is_null($carBrandNameEn)) {
            $query->whereHas('carBrand', function ($q) use($carBrandNameEn) {
                // car_brandsテーブルのname_enで検索
                $q->where('car_brands.name_en', "LIKE", "%".$carBrandNameEn."%");
            });
        }

        $orderArr = [
            'id' => 'id',
            'name' => 'name',
            'nameEn' => 'name_en',
            'carBrandId' => 'car_brand_id',
            'carBrandName' => 'car_brands.name',
            'carBrandNameEn' => 'car_brands.name_en',
        ];

        $sort = 'id';
        $orderby = 'asc';

        if (!is_null($order) && substr($order, 0, 1) != '-') {
            $sort = $orderArr[$order];
        } elseif (!is_null($order) && substr($order, 0, 1) == '-') {
            $sort = $orderArr[substr($order, 1)];// 先頭から1文字を削除
            $orderby = 'desc';
        }

        $carModels = $query->select('car_models.*')->join('car_brands', 'car_brands.id', '=', 'car_brand_id')->orderBy($sort, $orderby)->get();

        return $carModels;
    }
}
