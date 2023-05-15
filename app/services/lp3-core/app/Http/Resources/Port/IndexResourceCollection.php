<?php

namespace Services\Lp3Core\App\Http\Resources\Port;

use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\App\Http\Resources\ResourceCollection;
use Services\Lp3Core\App\Enums\PortType;

/**
 * 港の一覧の取得リソースコレクション
 */
class IndexResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->resource->map(function ($port) {
            return [
                'id' => $port->id,
                'name' => $port->name,
                'nameEn' => $port->name_en,
                'locationType' => $port->location_type,
                'locationTypeName' => LocationType::from($port->location_type)->label(),
                'type' => $port->type,
                'typeName' => PortType::from($port->type)->label(),
                'countryId' => $port->country_id,
                'zipCode' => $port->zip_code,
                'stateJp' => $port->state_jp,
                'stateEn' => $port->state_en,
                'cityJp' => $port->city_jp,
                'cityEn' => $port->city_en,
                'address1Jp' => $port->address1_jp,
                'address1En' => $port->address1_en,
                'address2Jp' => $port->address2_jp,
                'address2En' => $port->address2_en,
                'address3Jp' => $port->address3_jp,
                'address3En' => $port->address3_en,
                'unloCode' => $port->unlo_code,
                'requireLocalAgent' => $port->require_local_agent,
                'naccsCode' => $port->naccs_code,
                'timezone' => $port->timezone,
                'createdAt' => $port->created_at,
                'createdBy' => $port->created_by,
                'updatedAt' => $port->updated_at,
                'updatedBy' => $port->updated_by,
                'deletedAt' => $port->deleted_at,
                'deletedBy' => $port->deleted_by,
                'country' => $port->country ? [
                    'id' => $port->country->id,
                    'name' => $port->country->name,
                    'createdAt' => $port->country->created_at,
                    'createdBy' => $port->country->created_by,
                    'updatedAt' => $port->country->updated_at,
                    'updatedBy' => $port->country->updated_by,
                    'deletedAt' => $port->country->deleted_at,
                    'deletedBy' => $port->country->deleted_by,
                ] : null
            ];
        });
    }
}
