<?php

namespace Services\Lp3Cargo\App\Http\UseCases\Chassis;

use Illuminate\Pagination\LengthAwarePaginator;
use Services\Lp3Cargo\App\Models\Chassis;

/**
 * 車輌の一覧の取得
 */
class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data): LengthAwarePaginator
    {
        $query = Chassis::query()->with([
            'cargoType',
            'carModel',
            'carModel.carBrand',
            'shipper',
            'primeForwarder',
            'carryActivities',
            'carryActivities.yard',
        ]);

        if (isset($data['number']))
            $query->whereNumber($data['number']);

        if (isset($data['controlNumber']))
            $query->whereControlNumber($data['controlNumber']);

        if (isset($data['shipperId']))
            $query->whereShipper($data['shipperId']);

        if (isset($data['movable']))
            $query->whereMovable($data['movable']);

        if (isset($data['CarModelId']))
            $query->whereCarModel($data['CarModelId']);

        if(isset($data['yardId']))
            $query->whereYard($data['yardId']);

        if (isset($data['m3Min']) || isset($data['m3Max'])) {
            $query->whereM3(isset($data['m3Min']) && $data['m3Min'] ? $data['m3Min'] : 0, isset($data['m3Max']) && $data['m3Max'] ? $data['m3Max'] : 9999);
        }

        $pageSize = (isset($data['pageSize']) && $data['pageSize'] > 0) ? $data['pageSize'] : 30;
        $chassis = $query->orderBy('id')->paginate($pageSize);

        return $chassis;
    }
}
