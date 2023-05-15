<?php

namespace Services\Lp3Ship\App\Http\Resources\RoroShipSchedule;

use Services\Lp3Ship\App\Http\Resources\ResourceCollection;
use Services\Lp3Ship\App\Models\ShipScheduleItem;

/**
 * RORO船スケジュールの一覧の取得リソースコレクション
 */
class IndexResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->resource->map(function ($shipSchedule) {
            return [
                'id' => $shipSchedule->id,
                'shipId' => $shipSchedule->ship_id,
                'shipCompanyId' => $shipSchedule->ship_company_id,
                'voyageNumber' => $shipSchedule->voyage_number,
                'remarks' => $shipSchedule->remarks,
                'referUrl' => $shipSchedule->refer_url,
                'type' => $shipSchedule->type,
                'createdBy' => $shipSchedule->created_by,
                'createdAt' => $shipSchedule->created_at,
                'updatedBy' => $shipSchedule->updated_by,
                'updatedAt' => $shipSchedule->updated_at,
                'deletedBy' => $shipSchedule->deleted_by,
                'deletedAt' => $shipSchedule->deleted_at,
                'ship' => $shipSchedule->ship ? [
                    'id' => $shipSchedule->ship->id,
                    'name' => $shipSchedule->ship->name,
                    'type' => $shipSchedule->ship->type,
                    'createdBy' => $shipSchedule->ship->created_by,
                    'createdAt' => $shipSchedule->ship->created_at,
                    'updatedBy' => $shipSchedule->ship->updated_by,
                    'updatedAt' => $shipSchedule->ship->updated_at,
                    'deletedBy' => $shipSchedule->ship->deleted_by,
                    'deletedAt' => $shipSchedule->ship->deleted_at,
                ] : null,
                'shipCompany' => $shipSchedule->shipCompany ? [
                    'id' => $shipSchedule->shipCompany->id,
                    'name' => $shipSchedule->shipCompany->name,
                    'scacCode' => $shipSchedule->shipCompany->scac_code,
                    'mail' => $shipSchedule->shipCompany->mail,
                    'remarks' => $shipSchedule->shipCompany->remarks,
                    'countryId' => $shipSchedule->shipCompany->country_id,
                    'zipCode' => $shipSchedule->shipCompany->zip_code,
                    'stateJp' => $shipSchedule->shipCompany->state_jp,
                    'stateEn' => $shipSchedule->shipCompany->state_en,
                    'cityJp' => $shipSchedule->shipCompany->city_jp,
                    'cityEn' => $shipSchedule->shipCompany->city_en,
                    'address1Jp' => $shipSchedule->shipCompany->address1_jp,
                    'address1En' => $shipSchedule->shipCompany->address1_en,
                    'address2Jp' => $shipSchedule->shipCompany->address2_jp,
                    'address2En' => $shipSchedule->shipCompany->address2_en,
                    'address3Jp' => $shipSchedule->shipCompany->address3_jp,
                    'address3En' => $shipSchedule->shipCompany->address3_en,
                    'timezone' => $shipSchedule->shipCompany->timezone,
                    'createdBy' => $shipSchedule->shipCompany->created_by,
                    'createdAt' => $shipSchedule->shipCompany->created_at,
                    'updatedBy' => $shipSchedule->shipCompany->updated_by,
                    'updatedAt' => $shipSchedule->shipCompany->updated_at,
                    'deletedBy' => $shipSchedule->shipCompany->deleted_by,
                    'deletedAt' => $shipSchedule->shipCompany->deleted_at,
                ] : null,
                'scheduleItems' => $shipSchedule->scheduleItems ? $shipSchedule->scheduleItems->map(function (ShipScheduleItem $item) use ($shipSchedule) {
                    return [
                        'id' => $item->id,
                        'shipScheduleId' => $item->ship_schedule_id,
                        'polPortId' => $item->pol_port_id,
                        'polArrivelAt' => $item->pol_arrival_at,
                        'polArrivedAt' => $item->pol_arrived_at,
                        'polDepartureAt' => $item->pol_departure_at,
                        'polDepartedAt' => $item->pol_departed_at,
                        'podPortId' => $item->pod_port_id,
                        'podArrivelAt' => $item->pod_arrival_at,
                        'podArrivedAt' => $item->pod_arrived_at,
                        'documentCutAt' => $item->document_cut_at,
                        'documentAmCut' => $item->document_am_cut,
                        'remarks' => $item->remarks,
                        'irregularCyCut' => $item->irregular_cy_cut,
                        'available' => $item->available,
                        'fdId' => $item->fd_id,
                        'fdArrivalAt' => $item->fd_arrival_at,
                        'fdArrivedAt' => $item->fd_arrived_at,
                        'goDownAt' => $item->go_down_at,
                        'goDownZipCode' => $item->go_down_zip_code,
                        'goDownAddress' => $item->go_down_address,
                        'createdBy' => $item->created_by,
                        'createdAt' => $item->created_at,
                        'updatedBy' => $item->updated_by,
                        'updatedAt' => $item->updated_at,
                        'deletedBy' => $item->deleted_by,
                        'deletedAt' => $item->deleted_at,
                        'polPort' => $item->polPort ? [
                            'id' => $item->polPort->id,
                            'name' => $item->polPort->name
                        ] : null,
                        'podPort' => $item->podPort ? [
                            'id' => $item->podPort->id,
                            'name' => $item->podPort->name
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
        });
    }
}
