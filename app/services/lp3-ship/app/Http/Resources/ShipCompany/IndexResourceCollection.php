<?php

namespace Services\Lp3Ship\App\Http\Resources\ShipCompany;

use Services\Lp3Ship\App\Http\Resources\ResourceCollection;

/**
 * 船会社の一覧の取得リソースコレクション
 */
class IndexResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->resource->map(function ($shipCompany) {
            return [
                'id' => $shipCompany->id,
                'name' => $shipCompany->name,
                'scacCode' => $shipCompany->scac_code,
                'mail' => $shipCompany->mail,
                'remarks' => $shipCompany->remarks,
                'countryId' => $shipCompany->country_id,
                'zipCode' => $shipCompany->zip_code,
                'stateJp' => $shipCompany->state_jp,
                'stateEn' => $shipCompany->state_en,
                'cityJp' => $shipCompany->city_jp,
                'cityEn' => $shipCompany->city_en,
                'address1Jp' => $shipCompany->address1_jp,
                'address1En' => $shipCompany->address1_en,
                'address2Jp' => $shipCompany->address2_jp,
                'address2En' => $shipCompany->address2_en,
                'address3Jp' => $shipCompany->address3_jp,
                'address3En' => $shipCompany->address3_en,
                'timezone' => $shipCompany->timezone,
                'createdAt' => $shipCompany->created_at,
                'createdBy' => $shipCompany->created_by,
                'updatedAt' => $shipCompany->updated_at,
                'updatedBy' => $shipCompany->updated_by,
                'deletedAt' => $shipCompany->deleted_at,
                'deletedBy' => $shipCompany->deleted_by,
                'country' => $shipCompany->country ? [
                    'id' => $shipCompany->country->id,
                    'name' => $shipCompany->country->name,
                    'createdAt' => $shipCompany->country->created_at,
                    'createdBy' => $shipCompany->country->created_by,
                    'updatedAt' => $shipCompany->country->updated_at,
                    'updatedBy' => $shipCompany->country->updated_by,
                    'deletedAt' => $shipCompany->country->deleted_at,
                    'deletedBy' => $shipCompany->country->deleted_by
                ] : null
            ];
        });
    }
}
