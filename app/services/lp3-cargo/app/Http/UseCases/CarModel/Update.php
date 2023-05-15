<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarModel;

use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * 車種の更新
 */
class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id, $data): CarModel
    {
        $carModel = CarModel::findOrFail($id);
        $carBrand = CarBrand::findOrFail($data['carBrandId']);

        $carModel->name = $data['name'];
        $carModel->name_en = $data['nameEn'];
        $carModel->car_brand_id = $data['carBrandId'];
        $carModel->save();

        return $carModel;
    }
}
