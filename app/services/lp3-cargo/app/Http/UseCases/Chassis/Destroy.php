<?php

namespace Services\Lp3Cargo\App\Http\UseCases\Chassis;

use Services\Lp3Cargo\App\Models\Chassis;

/**
 * 車輌の削除
 */
class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Chassis
    {
        $chassis = Chassis::findOrFail($id);
        $chassis->delete();
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
