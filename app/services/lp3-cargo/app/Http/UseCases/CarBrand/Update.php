<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarBrand;

use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * 自動車ブランドの更新
 */
class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id, $data): CarBrand
    {
        $CarBrand = CarBrand::findOrFail($id);
        $CarBrand->name = $data['name'];
        $CarBrand->name_en = $data['nameEn'];
        $CarBrand->save();

        return $CarBrand;
    }
}
