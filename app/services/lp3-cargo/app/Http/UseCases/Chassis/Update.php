<?php

namespace Services\Lp3Cargo\App\Http\UseCases\Chassis;

use Services\Lp3Cargo\App\Models\Chassis;

/**
 * 車輌の更新
 */
class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke(int $id, array $data): Chassis
    {
        // ここはアクティビティの編集しないので、アクティビティ関連の操作はしない
        $chassis = Chassis::findOrFail($id);

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

        $chassis->save();

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
