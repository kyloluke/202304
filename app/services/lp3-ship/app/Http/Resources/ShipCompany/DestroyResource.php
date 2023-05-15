<?php

namespace Services\Lp3Ship\App\Http\Resources\ShipCompany;

use Services\Lp3Ship\App\Http\Resources\Resource;

/**
 * 船会社の削除リソース
 */
class DestroyResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'scacCode' => $this->resource->scac_code,
            'mail' => $this->resource->mail,
            'remarks' => $this->resource->remarks,
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
