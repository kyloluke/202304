<?php

namespace Services\Lp3Core\App\Http\Resources\Port;

use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Core\App\Http\Resources\Resource;

/**
 * 港の一覧の取得リソース
 */
class StoreResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'nameEn' => $this->resource->name_en,
            'locationType' => $this->resource->location_type,
            'locationTypeName' => LocationType::from($this->resource->location_type)->label(),
            'type' => $this->resource->type,
            'typeName' => PortType::from($this->resource->type)->label(),
            'countryId' => $this->resource->country_id,
            'zipCode' => $this->resource->zip_code,
            'stateJp' => $this->resource->state_jp,
            'stateEn' => $this->resource->state_en,
            'cityJp' => $this->resource->city_jp,
            'cityEn' => $this->resource->city_en,
            'address1Jp' => $this->resource->address1_jp,
            'address1En' => $this->resource->address1_en,
            'address2Jp' => $this->resource->address2_jp,
            'address2En' => $this->resource->address2_en,
            'address3Jp' => $this->resource->address3_jp,
            'address3En' => $this->resource->address3_en,
            'unloCode' => $this->resource->unlo_code,
            'requireLocalAgent' => $this->resource->require_local_agent,
            'naccsCode' => $this->resource->naccs_code,
            'timezone' => $this->resource->timezone,
            'createdAt' => $this->resource->created_at,
            'createdBy' => $this->resource->created_by,
            'updatedAt' => $this->resource->updated_at,
            'updatedBy' => $this->resource->updated_by,
            'deletedAt' => $this->resource->deleted_at,
            'deletedBy' => $this->resource->deleted_by,
            'country' => $this->resource->country ? [
                'id' => $this->resource->country->id,
                'name' => $this->resource->country->name,
                'createdAt' => $this->resource->country->created_at,
                'createdBy' => $this->resource->country->created_by,
                'updatedAt' => $this->resource->country->updated_at,
                'updatedBy' => $this->resource->country->updated_by,
                'deletedAt' => $this->resource->country->deleted_at,
                'deletedBy' => $this->resource->country->deleted_by,
            ] : null
        ];
    }
}
