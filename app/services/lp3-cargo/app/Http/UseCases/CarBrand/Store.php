<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarBrand;

use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * 自動車ブランドの登録
 */
class Store
{
    /**
     * 関数呼び出し
     */
    public function __invoke($data): CarBrand
    {
        $CarBrand = new CarBrand();
        $CarBrand->name = $data['name'];
        $CarBrand->name_en = $data['nameEn'];
        $CarBrand->save();

        return $CarBrand;
    }
}
