<?php

namespace Services\Lp3Cargo\App\Http\UseCases\Chassis;

use Illuminate\Support\Facades\DB;
use Services\Lp3Cargo\App\Models\Chassis;
use Services\Lp3Cargo\App\Models\ChassisCarryActivity;

/**
 * 車輌の登録
 */
class Store
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data): Chassis
    {
        // 1.車両作成
        $chassis = new Chassis;

        $chassis->cargo_type_id = (isset($data['cargoTypeId']) && $data['cargoTypeId']) ? $data['cargoTypeId'] : 1;

        $latestId = Chassis::getIncrementId();
        $chassis->control_number = $latestId + 1; //   LP2 => laravel\app\Models\Chassis.php@makeControlNo  後uniqueのチェック追加する todo@lu

        if (isset($data['number'])) {
            $chassis->number = $data['number'];
            $chassis->search_number = str_replace('-', '', $data['number']);
        }

        if (isset($data['carModelId']))
            $chassis->car_model_id = $data['carModelId'];

        if (isset($data['shipperId']))
            $chassis->shipper_id = $data['shipperId'];

        if (isset($data['shipperRefNo']))
            $chassis->shipper_ref_no = $data['shipperRefNo'];


        if (isset($data['displacement']))
            $chassis->displacement = $data['displacement'];

        if (isset($data['weight']))
            $chassis->weight = $data['weight'];

        if (isset($data['extent']))
            $chassis->extent = $data['extent'];

        if (isset($data['width']))
            $chassis->width = $data['width'];

        if (isset($data['height']))
            $chassis->height = $data['height'];

        if (isset($data['m3']))
            $chassis->m3 = $data['m3'];

        if (isset($data['movable']))
            $chassis->movable = $data['movable'];

        if (isset($data['primeForwarderId']))
            $chassis->prime_forwarder_id = $data['primeForwarderId'];

        if (isset($data['requireCollectKey']))
            $chassis->require_collect_key = $data['requireCollectKey'];

        if (isset($data['requireExtraLashing']))
            $chassis->require_extra_lashing = $data['requireExtraLashing'];

        if (isset($data['requirePhotoForSale']))
            $chassis->require_photo_for_sale = $data['requirePhotoForSale'];

        if (isset($data['remarks']))
            $chassis->remarks = $data['remarks'];

        if (isset($data['innerCargoRemarks']))
            $chassis->inner_cargo_remarks = $data['innerCargoRemarks'];

        if (isset($data['adminRemarks']))
            $chassis->admin_remarks = $data['adminRemarks'];

        if (isset($data['expectedJobType']))
            $chassis->expected_job_type = $data['expectedJobType'];

        // 2.アクティビティ　作成
        $chassisCarryActivity = new ChassisCarryActivity;
        if (isset($data['yardId']))
            $chassisCarryActivity->yard_id = $data['yardId'];

        if (isset($data['remarks']))
            $chassisCarryActivity->remarks = $data['remarks'];

        if (isset($data['adminRemarks']))
            $chassisCarryActivity->admin_remarks = $data['adminRemarks'];

        if (isset($data['groupingValue']))
            $chassisCarryActivity->grouping_value = $data['groupingValue'];

        if (isset($data['type']))
            $chassisCarryActivity->type = $data['type'];

        if (isset($data['moveInScheduleDate']))
            $chassisCarryActivity->act_at = $data['moveInScheduleDate'];

        $chassisCarryActivity->prospect = true;
        $chassisCarryActivity->author_id = 1; // 登録しているユーザーID todo@lu
        $chassisCarryActivity->auth_at = now()->toDateTimeString();
        DB::transaction(function () use ($chassis, $chassisCarryActivity) {
            $chassis->save();
            $chassisCarryActivity->chassis_id = $chassis->id;
            $chassisCarryActivity->save();
        });

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
