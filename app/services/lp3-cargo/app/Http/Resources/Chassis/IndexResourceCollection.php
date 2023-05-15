<?php

namespace Services\Lp3Cargo\App\Http\Resources\Chassis;

use Services\Lp3Cargo\App\Enums\ChassisCarryType;
use Services\Lp3Cargo\App\Http\Resources\ResourceCollection as BaseResourceCollection;
use Services\Lp3Core\App\Enums\OfficeStatus;
use Services\Lp3Job\App\Enums\JobType;

/**
 * 車輌一覧のリソースコレクション
 */
class IndexResourceCollection extends BaseResourceCollection
{
    public function toArray($request)
    {
        return $this->resource->map(function ($chassis) {
            return [
                'id' => $chassis->id,
                'cargoTypeId' => $chassis->cargo_type_id,
                'carModelId' => $chassis->car_model_id,
                'controlNumber' => $chassis->control_number,
                'number' => $chassis->number,
                'searchNumber' => $chassis->search_number,
                'displacement' => $chassis->displacement,
                'weight' => $chassis->weight,
                'extent' => $chassis->extent,
                'width' => $chassis->width,
                'height' => $chassis->height,
                'm3' => $chassis->m3,
                'movable' => $chassis->movable,
                'shipperId' => $chassis->shipper_id,
                'shipperRefNo' => $chassis->shipper_ref_no,
                'primeForwarderId' => $chassis->prime_forwarder_id,
                'requireCollectKey' => $chassis->require_collect_key,
                'requireExtraLashing' => $chassis->require_extra_lashing,
                'requirePhotoForSale' => $chassis->require_photo_for_sale,
                'remarks' => $chassis->remarks,
                'innerCargoRemarks' => $chassis->inner_cargo_remarks,
                'adminRemarks' => $chassis->admin_remarks,
                'expectedJobType' => $chassis->expected_job_type,
                'expectedJobTypeStr' => $chassis->expected_job_type ? JobType::from($chassis->expected_job_type)->label() : null,
                'createdBy' => $chassis->created_by,
                'updatedBy' => $chassis->updated_by,
                'deletedBy' => $chassis->deleted_by,
                'deletedAt' => $chassis->deleted_at,
                'createdAt' => $chassis->created_at,
                'updatedAt' => $chassis->updated_at,
                'carModel' => $chassis->carModel ? [
                    'id' => $chassis->carModel->id,
                    'name' => $chassis->carModel->name,
                    'nameEn' => $chassis->carModel->name_en,
                    'carBrand' => $chassis->carModel->carBrand ? [
                        'id' => $chassis->carModel->carBrand->id,
                        'name' => $chassis->carModel->carBrand->name,
                        'nameEn' => $chassis->carModel->carBrand->name_en
                    ] : null,
                ] : null,
                'cargoType' => $chassis->cargoType ? [
                    'id' => $chassis->cargoType->id,
                    'name' => $chassis->cargoType->name,
                    'nameEn' => $chassis->cargoType->name_en,
                ] : null,
                'shipper' => $chassis->shipper ? [
                    'id' => $chassis->shipper->id,
                    'name' => $chassis->shipper->id,
                    'status' => $chassis->shipper->status,
                    'statusStr' => OfficeStatus::from($chassis->shipper->status)->label(),
                ] : null,
                'primeForwarder' => $chassis->primeForwarder ? [
                    'id' => $chassis->primeForwarder->id,
                    'name' => $chassis->primeForwarder->id,
                    'status' => $chassis->primeForwarder->status,
                    'statusStr' => OfficeStatus::from($chassis->primeForwarder->status)->label(),
                ] : null,
                'carryActivities' => $chassis->carryActivities->isNotEmpty() ? $chassis->carryActivities->map(function ($carryActivity) {
                    return [
                        'id' => $carryActivity->id,
                        'prospect' => $carryActivity->prospect,
                        'actAt' => $carryActivity->act_at,
                        'authAt' => $carryActivity->auth_at,
                        'authorId' => $carryActivity->author_id,
                        'remarks' => $carryActivity->remarks,
                        'adminRemarks' => $carryActivity->admin_remarks,
                        'groupingValue' => $carryActivity->grouping_value,
                        'yardId' => $carryActivity->yard_id,
                        'type' => $carryActivity->type,
                        'typeStr' => ChassisCarryType::from($carryActivity->type)->label(),
                        'yard' => $carryActivity->yard ? [
                            'id' => $carryActivity->yard_id,
                            'nameJp' => $carryActivity->name_jp,
                            'nameEn' => $carryActivity->name_en
                        ] : null,
                    ];
                }) : null,
            ];
        });
    }
}
