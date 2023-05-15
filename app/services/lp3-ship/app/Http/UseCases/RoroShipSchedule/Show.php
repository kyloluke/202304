<?php

namespace Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule;

use Services\Lp3Ship\App\Models\ShipSchedule;

class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke(string $id): ShipSchedule
    {
        $shipSchedule = ShipSchedule::findOrFail($id);
        return $shipSchedule->load([
            'ship',
            'shipCompany',
            'scheduleItems',
            'scheduleItems.polPort',
            'scheduleItems.podPort',
            'scheduleItems.destination'
        ]);
    }
}
