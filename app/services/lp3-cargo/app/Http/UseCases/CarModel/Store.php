<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarModel;

use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * 車種の登録
 */
class Store
{
    /**
     * 関数呼び出し
     */
    public function __invoke($data): CarModel
    {
        $carBrand = CarBrand::findOrFail($data['carBrandId']);
        $carModel = new CarModel();
        $carModel->name = $data['name'];
        $carModel->name_en = $data['nameEn'];
        $carModel->car_brand_id = $data['carBrandId'];
        $carModel->save();

        return $carModel;
    }
}
