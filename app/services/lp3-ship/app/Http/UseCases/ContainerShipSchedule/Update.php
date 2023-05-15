<?php

namespace Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule;

use Illuminate\Support\Facades\DB;
use Services\Lp3Ship\App\Enums\ShipScheduleType;
use Services\Lp3Ship\App\Exceptions\ShipScheduleSaveException;
use Services\Lp3Ship\App\Models\ShipSchedule;
use Services\Lp3Ship\App\Models\ShipScheduleItem;
use Services\Lp3Ship\App\UseCases\GetPolOrPodFromItems;
use Services\Lp3Ship\App\UseCases\ContainerScheduleCheckUnique;

class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke(string $id, array $reqData): ShipSchedule
    {
        $shipSchedule = ShipSchedule::find($id);

        if (!$shipSchedule)
            throw new ShipScheduleSaveException('本船スケジュールが見つかりませんでした', 404);

        if (isset($reqData['shipId']))
            $shipSchedule->ship_id = $reqData['shipId'];

        if (isset($reqData['shipCompanyId']))
            $shipSchedule->ship_company_id = $reqData['shipCompanyId'];

        if (isset($reqData['voyageNumber']))
            $shipSchedule->voyage_number = $reqData['voyageNumber'];

        // ユニークチェック
        $mixPolDepartureAt = (new GetPolOrPodFromItems)($reqData['scheduleItems'], 'polDepartureAt');
        $maxPodArrivalAt = (new GetPolOrPodFromItems)($reqData['scheduleItems'], 'podArrivalAt', 'desc');
        $uniCheckData = [
            'shipId' => $shipSchedule->ship_id,
            'shipCompanyId' => $shipSchedule->ship_company_id,
            'voyageNumber' => $shipSchedule->voyage_number,
            'polDepartureAt' => $mixPolDepartureAt,
            'podArrivalAt' => $maxPodArrivalAt,
        ];
        $exists = (new ContainerScheduleCheckUnique)($uniCheckData, $id);
        if (!$exists) {
            throw new ShipScheduleSaveException('ユニークチェックで、変更できません', 500);
        }

        if (isset($reqData['remarks']))
            $shipSchedule->remarks = $reqData['remarks'];

        if (isset($reqData['referUrl']))
            $shipSchedule->refer_url = $reqData['referUrl'];

        $shipSchedule->type = ShipScheduleType::CONTAINER_SHIP->value;

        DB::transaction(function () use ($shipSchedule, $reqData) {
            $shipSchedule->save();
            $itemIdArr = $shipSchedule->getItemIds()->toArray();
            $updateIdArr = [];
            foreach ($reqData['scheduleItems'] as $val) {

                if (isset($val['id']) && $val['id']) {
                    $scheduleItem = ShipScheduleItem::find($val['id']);
                    array_push($updateIdArr, $val['id']);
                } else {
                    $scheduleItem = new ShipScheduleItem;
                }

                $scheduleItem->ship_schedule_id = $shipSchedule->id;

                if (isset($val['polPortId']))
                    $scheduleItem->pol_port_id = $val['polPortId'];

                if (isset($val['polArrivalAt']))
                    $scheduleItem->pol_arrival_at = $val['polArrivalAt'];

                if (isset($val['polArrivedAt']))
                    $scheduleItem->pol_arrived_at = $val['polArrivedAt'];

                if (isset($val['polDepartureAt']))
                    $scheduleItem->pol_departure_at = $val['polDepartureAt'];

                if (isset($val['polDepartedAt']))
                    $scheduleItem->pol_departed_at = $val['polDepartedAt'];

                if (isset($val['podPortId']))
                    $scheduleItem->pod_port_id = $val['podPortId'];

                if (isset($val['podArrivalAt']))
                    $scheduleItem->pod_arrival_at = $val['podArrivalAt'];

                if (isset($val['podArrivedAt']))
                    $scheduleItem->pod_arrived_at = $val['podArrivedAt'];

                if (isset($val['documentCutAt']))
                    $scheduleItem->document_cut_at = $val['documentCutAt'];

                if (isset($val['documentAmCut']))
                    $scheduleItem->document_am_cut = $val['documentAmCut'];

                if (isset($val['remarks']))
                    $scheduleItem->remarks = $val['remarks'];

                if (isset($val['irregularCyCut']))
                    $scheduleItem->irregular_cy_cut = $val['irregularCyCut'];

                if (isset($val['available']))
                    $scheduleItem->available = $val['available'];

                if (isset($val['fdId']))
                    $scheduleItem->fd_id = $val['fdId'];

                if (isset($val['fdArrivalAt']))
                    $scheduleItem->fd_arrival_at = $val['fdArrivalAt'];

                if (isset($val['fdArrivedAt']))
                    $scheduleItem->fd_arrived_at = $val['fdArrivedAt'];

                if (isset($val['cyOpenAt']))
                    $scheduleItem->cy_open_at = $val['cyOpenAt'];

                if (isset($val['cyCutAt']))
                    $scheduleItem->cy_cut_at = $val['cyCutAt'];

                if (isset($val['cyAmCut']))
                    $scheduleItem->cy_am_cut = $val['cyAmCut'];

                $scheduleItem->save();
            }

            $delItemIdArr = array_diff($itemIdArr, $updateIdArr);
            $shipSchedule->scheduleItems()->whereIn('id', $delItemIdArr)->delete();
        });

        return $shipSchedule->refresh()->load([
            'ship',
            'shipCompany',
            'scheduleItems',
            'scheduleItems.polPort',
            'scheduleItems.podPort',
            'scheduleItems.destination'
        ]);
    }
}
