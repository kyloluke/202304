<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarBrand;

use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * 自動車ブランドの削除
 */
class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): CarBrand
    {
        $CarBrand = CarBrand::findOrFail($id);

        CarBrand::destroy($id);

        return $CarBrand;
    }
}
