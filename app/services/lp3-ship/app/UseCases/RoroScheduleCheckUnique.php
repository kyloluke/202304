<?php

namespace Services\Lp3Ship\App\UseCases;

use Services\Lp3Ship\App\Models\ShipSchedule;
use Carbon\Carbon;

class RoroScheduleCheckUnique
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data, int|null $id = null): bool
    {
        $query = ShipSchedule::with('scheduleItems')
            ->whereShipIdSearch($data['shipId'])
            ->whereShipCompanyIdSearch($data['shipCompanyId'])
            ->whereVoyageNumberSearch($data['voyageNumber'], false)
            ->whereHas('scheduleItems', function ($query) use ($data) {
                $query
                    // 積地出発予定日は、揚地到着地予定日より、200日以内、条件を達しただけの件がターゲットです
                    ->where(function ($q) use ($data) {
                        $q
                            ->whereBetween('pod_arrival_at', [Carbon::parse($data['polDepartureAt'])->subDays(200), Carbon::parse($data['polDepartureAt'])])
                            ->whereNotNull('pod_arrival_at');
                    })
                    // 揚地到着地予定日は、積地出発予定日まで、200日以内、条件を達しただけの件がターゲットです
                    ->orWhere(function ($q) use ($data) {
                        $q
                            ->whereBetween('pol_departure_at', [Carbon::parse($data['podArrivalAt']), Carbon::parse($data['podArrivalAt'])->addDays(200)])
                            ->whereNotNull('pol_departure_at');
                    })

                    // 出発日か到着日か一方が被る場合
                    ->orWhere(function ($q) use ($data) {
                        $q
                            ->whereBetween('pod_arrival_at', [Carbon::parse($data['polDepartureAt']), Carbon::parse($data['podArrivalAt'])])
                            ->orWhereBetween('pol_departure_at', [Carbon::parse($data['polDepartureAt']), Carbon::parse($data['podArrivalAt'])]);
                    })
                    // 全期間かぶる場合
                    ->orWhere(function ($q) use ($data) {
                        $q
                            ->where('pod_arrival_at', '>=', Carbon::parse($data['podArrivalAt']))
                            ->where('pol_departure_at', '<=', Carbon::parse($data['polDepartureAt']));
                    });
            });

        if ($id) {
            $query->where('id', '!=', $id);
        }
        $exists = $query->exists();

        return !$exists;
    }
}
