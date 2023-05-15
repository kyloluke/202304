<?php

namespace Services\Lp3Cargo\App\Http\UseCases\Chassis;

use Services\Lp3Cargo\App\Models\Chassis;

/**
 * 車輌の取得
 */
class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Chassis
    {
        $chassis = Chassis::findOrFail($id);

        return $chassis->refresh()->load([
            'cargoType',
            'carModel',
            'carModel.carBrand',
            'shipper',
            'primeForwarder',
            'carryActivities',
            'carryActivities.yard',
        ]);
    }
}
