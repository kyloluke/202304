<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarModel;

use Services\Lp3Cargo\App\Models\CarModel;

/**
 * 車種の取得
 */
class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): CarModel
    {
        $carModel = CarModel::findOrFail($id);
        return $carModel;
    }
}
