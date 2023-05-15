<?php

namespace Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule;

use Services\Lp3Ship\App\Http\Resources\Resource;
use Services\Lp3Ship\App\Models\ShipScheduleItem;

/**
 * コンテナ船スケジュールの新規作成リソース
 */
class StoreResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'shipId' => $this->resource->ship_id,
            'shipCompanyId' => $this->resource->ship_company_id,
            'voyageNumber' => $this->resource->voyage_number,
            'remarks' => $this->resource->remarks,
            'referUrl' => $this->resource->refer_url,
            'type' => $this->resource->type,
            'createdBy' => $this->resource->created_by,
            'createdAt' => $this->resource->created_at,
            'updatedBy' => $this->resource->updated_by,
            'updatedAt' => $this->resource->updated_at,
            'deletedBy' => $this->resource->deleted_by,
            'deletedAt' => $this->resource->deleted_at,
            'ship' => $this->resource->ship ? [
                'id' => $this->resource->ship->id,
                'name' => $this->resource->ship->name,
                'type' => $this->resource->ship->type,
                'createdBy' => $this->resource->ship->created_by,
                'createdAt' => $this->resource->ship->created_at,
                'updatedBy' => $this->resource->ship->updated_by,
                'updatedAt' => $this->resource->ship->updated_at,
                'deletedBy' => $this->resource->ship->deleted_by,
                'deletedAt' => $this->resource->ship->deleted_at,
            ] : null,
            'shipCompany' => $this->resource->shipCompany ? [
                'id' => $this->resource->shipCompany->id,
                'name' => $this->resource->shipCompany->name,
                'scacCode' => $this->resource->shipCompany->scac_code,
                'mail' => $this->resource->shipCompany->mail,
                'remarks' => $this->resource->shipCompany->remarks,
                'countryId' => $this->resource->shipCompany->country_id,
                'zipCode' => $this->resource->shipCompany->zip_code,
                'stateJp' => $this->resource->shipCompany->state_jp,
                'stateEn' => $this->resource->shipCompany->state_en,
                'cityJp' => $this->resource->shipCompany->city_jp,
                'cityEn' => $this->resource->shipCompany->city_en,
                'address1Jp' => $this->resource->shipCompany->address1_jp,
                'address1En' => $this->resource->shipCompany->address1_en,
                'address2Jp' => $this->resource->shipCompany->address2_jp,
                'address2En' => $this->resource->shipCompany->address2_en,
                'address3Jp' => $this->resource->shipCompany->address3_jp,
                'address3En' => $this->resource->shipCompany->address3_en,
                'timezone' => $this->resource->shipCompany->timezone,
                'createdBy' => $this->resource->shipCompany->created_by,
                'createdAt' => $this->resource->shipCompany->created_at,
                'updatedBy' => $this->resource->shipCompany->updated_by,
                'updatedAt' => $this->resource->shipCompany->updated_at,
                'deletedBy' => $this->resource->shipCompany->deleted_by,
                'deletedAt' => $this->resource->shipCompany->deleted_at,
            ] : null,
            'scheduleItems' => $this->resource->scheduleItems ? $this->resource->scheduleItems->map(function (ShipScheduleItem $item) {
                return [
                    'id' => $item->id,
                    'shipScheduleId' => $item->ship_schedule_id,
                    'polPortId' => $item->pol_port_id,
                    'polArrivalAt' => $item->pol_arrival_at,
                    'polArrivedAt' => $item->pol_arrived_at,
                    'polDepartureAt' => $item->pol_departure_at,
                    'polDepartedAt' => $item->pol_departed_at,
                    'podPortId' => $item->pod_port_id,
                    'podArrivalAt' => $item->pod_arrival_at,
                    'podArrivedAt' => $item->pod_arrived_at,
                    'documentCutAt' => $item->document_cut_at,
                    'documentAmCut' => $item->document_am_cut,
                    'remarks' => $item->remarks,
                    'irregularCyCut' => $item->irregular_cy_cut,
                    'available' => $item->available,
                    'fdId' => $item->fd_id,
                    'fdArrivalAt' => $item->fd_arrival_at,
                    'fdArrivedAt' => $item->fd_arrived_at,
                    'cyOpenAt' => $item->cy_open_at,
                    'cyCutAt' => $item->cy_cut_at,
                    'cyAmCut' => $item->cy_am_cut,
                    'createdBy' => $item->created_by,
                    'createdAt' => $item->created_at,
                    'updatedBy' => $item->updated_by,
                    'updatedAt' => $item->updated_at,
                    'deletedBy' => $item->deleted_by,
                    'deletedAt' => $item->deleted_at,
                    'polPort' => $item->polPort ? [
                        'id' => $item->polPort->id,
                        'name' => $item->polPort->name,
                    ] : null,
                    'podPort' => $item->podPort ? [
                        'id' => $item->podPort->id,
                        'name' => $item->podPort->name,
                    ] : null,
                    'destination' => $item->destination ? [
                        'id' => $item->destination->id,
                        'countryId' => $item->destination->country_id,
                        'zipCode' => $item->destination->zip_code,
                        'stateJp' => $item->destination->state_jp,
                        'stateEn' => $item->destination->state_en,
                        'cityJp' => $item->destination->city_jp,
                        'cityEn' => $item->destination->city_en,
                        'address1Jp' => $item->destination->address1_jp,
                        'address1En' => $item->destination->address1_en,
                        'address2Jp' => $item->destination->address2_jp,
                        'address2En' => $item->destination->address2_jp,
                        'address3Jp' => $item->destination->address2_jp,
                        'address3En' => $item->destination->address2_jp,
                        'unloCode' => $item->destination->unlo_code,
                        'requireLocalAgent' => $item->destination->require_local_agent,
                        'naccsCode' => $item->destination->naccs_code,
                        'timezone' => $item->destination->timezone,
                        'createdBy' => $item->destination->created_by,
                        'createdAt' => $item->destination->created_at,
                        'updatedBy' => $item->destination->updated_by,
                        'updatedAt' => $item->destination->updated_at,
                        'deletedBy' => $item->destination->deleted_by,
                        'deletedAt' => $item->destination->deleted_at
                    ] : null
                ];
            }) : null
        ];
    }
}
