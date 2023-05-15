<?php

namespace Services\Lp3Cargo\App\Http\Resources\Chassis;

use Services\Lp3Cargo\App\Enums\ChassisCarryType;
use Services\Lp3Cargo\App\Http\Resources\Resource as BaseResource;
use Services\Lp3Core\App\Enums\OfficeStatus;
use Services\Lp3Job\App\Enums\JobType;

/**
 * 車輌の登録APIリソース
 */
class StoreResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'cargoTypeId' => $this->resource->cargo_type_id,
            'carModelId' => $this->resource->car_model_id,
            'controlNumber' => $this->resource->control_number,
            'number' => $this->resource->number,
            'searchNumber' => $this->resource->search_number,
            'displacement' => $this->resource->displacement,
            'weight' => $this->resource->weight,
            'extent' => $this->resource->extent,
            'width' => $this->resource->width,
            'height' => $this->resource->height,
            'm3' => $this->resource->m3,
            'movable' => $this->resource->movable,
            'shipperId' => $this->resource->shipper_id,
            'shipperRefNo' => $this->resource->shipper_ref_no,
            'primeForwarderId' => $this->resource->prime_forwarder_id,
            'requireCollectKey' => $this->resource->require_collect_key,
            'requireExtraLashing' => $this->resource->require_extra_lashing,
            'requirePhotoForSale' => $this->resource->require_photo_for_sale,
            'remarks' => $this->resource->remarks,
            'innerCargoRemarks' => $this->resource->inner_cargo_remarks,
            'adminRemarks' => $this->resource->admin_remarks,
            'expectedJobType' => $this->resource->expected_job_type,
            'expectedJobTypeStr' => $this->resource->expected_job_type ? JobType::from($this->resource->expected_job_type)->label() : null,
            'createdBy' => $this->resource->created_by,
            'updatedBy' => $this->resource->updated_by,
            'deletedBy' => $this->resource->deleted_by,
            'deletedAt' => $this->resource->deleted_at,
            'createdAt' => $this->resource->created_at,
            'updatedAt' => $this->resource->updated_at,
            'carModel' => $this->resource->carModel ? [
                'id' => $this->resource->carModel->id,
                'name' => $this->resource->carModel->name,
                'nameEn' => $this->resource->carModel->name_en,
                'carBrand' => $this->resource->carModel->carBrand ? [
                    'id' => $this->resource->carModel->carBrand->id,
                    'name' => $this->resource->carModel->carBrand->name,
                    'nameEn' => $this->resource->carModel->carBrand->name_en
                ] : null,
            ] : null,
            'cargoType' => $this->resource->cargoType ? [
                'id' => $this->resource->cargoType->id,
                'name' => $this->resource->cargoType->name,
                'nameEn' => $this->resource->cargoType->name_en,
            ] : null,
            'shipper' => $this->resource->shipper ? [
                'id' => $this->resource->shipper->id,
                'name' => $this->resource->shipper->id,
                'status' => $this->resource->shipper->status,
                'statusStr' => OfficeStatus::from($this->resource->shipper->status)->label(),
            ] : null,
            'primeForwarder' => $this->resource->primeForwarder ? [
                'id' => $this->resource->primeForwarder->id,
                'name' => $this->resource->primeForwarder->id,
                'status' => $this->resource->primeForwarder->status,
                'statusStr' => OfficeStatus::from($this->resource->primeForwarder->status)->label(),
            ] : null,
            'carryActivities' => $this->resource->carryActivities->isNotEmpty() ? $this->resource->carryActivities->map(function ($carryActivity) {
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
                    'type' => ChassisCarryType::from($carryActivity->type)->label(),
                    'yard' => $carryActivity->yard ? [
                        'id' => $carryActivity->yard_id,
                        'nameJp' => $carryActivity->name_jp,
                        'nameEn' => $carryActivity->name_en
                    ] : null,
                ];
            }) : null,
        ];
    }
}
