<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarModel;

use Services\Lp3Cargo\App\Models\CarModel;

/**
 * 車種の削除
 */
class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): CarModel
    {
        $carModel = CarModel::findOrFail($id);

        CarModel::destroy($id);

        return $carModel;
    }
}
