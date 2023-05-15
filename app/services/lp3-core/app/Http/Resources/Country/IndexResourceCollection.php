<?php

namespace Services\Lp3Core\App\Http\Resources\Country;

use Services\Lp3Core\App\Http\Resources\ResourceCollection;
use Services\Lp3Core\App\Models\InspectionType;

/**
 * 国の一覧の取得リソースコレクション
 */
class IndexResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->resource->map(function ($country) {
            return [
                'id' => $country->id,
                'name' => $country->name,
                'regionId' => $country->region_id,
                'createdAt' => $country->created_at,
                'createdBy' => $country->created_by,
                'updatedAt' => $country->updated_at,
                'updatedBy' => $country->updated_by,
                'deletedAt' => $country->deleted_at,
                'deletedBy' => $country->deleted_by,
                'requiredInspections' => $country->requiredInspections->isNotEmpty() ? $country->requiredInspections->map(function (InspectionType $type) {
                    return [
                        'id' => $type->id,
                        'name' => $type->name,
                        'createdAt' => $type->created_at,
                        'createdBy' => $type->created_by,
                        'updatedAt' => $type->updated_at,
                        'updatedBy' => $type->updated_by,
                        'deletedAt' => $type->deleted_at,
                        'deletedBy' => $type->deleted_by
                    ];
                }) : null,
                'region' => $country->region ? [
                    'id' => $country->region->id,
                    'name' => $country->region->name,
                    'createdAt' => $country->region->created_at,
                    'createdBy' => $country->region->created_by,
                    'updatedAt' => $country->region->updated_at,
                    'updatedBy' => $country->region->updated_by,
                    'deletedAt' => $country->region->deleted_at,
                    'deletedBy' => $country->region->deleted_by,
                ] : null
            ];
        });

    }
}
