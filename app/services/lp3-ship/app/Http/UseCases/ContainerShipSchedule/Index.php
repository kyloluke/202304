<?php

namespace Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule;

use Illuminate\Database\Eloquent\Collection;
use Services\Lp3Ship\App\Enums\ShipScheduleType;
use Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Illuminate\Pagination\LengthAwarePaginator;

class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data): Collection|LengthAwarePaginator
    {
        $query = ShipSchedule::query()
            ->with([
                'ship',
                'shipCompany',
                'scheduleItems',
                'scheduleItems.polPort',
                'scheduleItems.podPort',
                'scheduleItems.destination'
            ])
            ->whereHas('ship', fn($q) => $q->whereIn('type', [ShipType::CONTAINER_SHIP->value, ShipType::CONRO_SHIP->value]))
            ->where(function ($q) {
                $q->whereNull('type')->orWhere('type', '!=', ShipScheduleType::RORO_SHIP->value);
            });

        if (isset($data['shipId']))
            $query->whereShipIdSearch($data['shipId']);

        if (isset($data['shipCompanyId']))
            $query->whereShipCompanyIdSearch($data['shipCompanyId']);

        if (isset($data['polPortId']))
            $query->wherePolPortIdSearch($data['polPortId']);

        if (isset($data['podPortId']))
            $query->wherePodPortIdSearch($data['podPortId']);

        if (isset($data['voyageNumber']))
            $query->whereVoyageNumberSearch($data['voyageNumber']);

        if (isset($data['cyCutAt']) && $data['cyCutAt'])
            $query->whereCyCutAtSearch($data['cyCutAt']);

        $pageSize = (isset($data['pageSize']) && $data['pageSize'] > 0) ? $data['pageSize'] : 30;

        $shipSchedule = $query->orderBy('id')->paginate($pageSize);

        return $shipSchedule;
    }
}
