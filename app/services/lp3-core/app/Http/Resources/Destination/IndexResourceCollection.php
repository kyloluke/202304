<?php

namespace Services\Lp3Core\App\Http\Resources\Destination;

use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\App\Http\Resources\ResourceCollection;

/**
 * 仕向地の一覧の取得リソースコレクション
 */
class IndexResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->resource->map(function ($location) {
            return [
                'id' => $location->id,
                'name' => $location->name,
                'nameEn' => $location->name_en,
                'locationType' => $location->location_type,
                'locationTypeName' => LocationType::from($location->location_type)->label(),
                'countryId' => $location->country_id,
                'zipCode' => $location->zip_code,
                'stateJp' => $location->state_jp,
                'stateEn' => $location->state_en,
                'cityJp' => $location->city_jp,
                'cityEn' => $location->city_en,
                'address1Jp' => $location->address1_jp,
                'address1En' => $location->address1_en,
                'address2Jp' => $location->address2_jp,
                'address2En' => $location->address2_en,
                'address3Jp' => $location->address3_jp,
                'address3En' => $location->address3_en,
                'unloCode' => $location->unlo_code,
                'requireLocalAgent' => $location->require_local_agent,
                'naccsCode' => $location->naccs_code,
                'timezone' => $location->timezone,
                'createdAt' => $location->created_at,
                'createdBy' => $location->created_by,
                'updatedAt' => $location->updated_at,
                'updatedBy' => $location->updated_by,
                'deletedAt' => $location->deleted_at,
                'deletedBy' => $location->deleted_by,
                'country' => $location->country ? [
                    'id' => $location->country->id,
                    'name' => $location->country->name,
                    'createdAt' => $location->country->created_at,
                    'createdBy' => $location->country->created_by,
                    'updatedAt' => $location->country->updated_at,
                    'updatedBy' => $location->country->updated_by,
                    'deletedAt' => $location->country->deleted_at,
                    'deletedBy' => $location->country->deleted_by,
                ] : null
            ];
        });
    }
}
