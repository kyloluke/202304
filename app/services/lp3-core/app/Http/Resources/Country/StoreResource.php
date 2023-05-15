<?php

namespace Services\Lp3Core\App\Http\Resources\Country;

use Services\Lp3Core\App\Http\Resources\Resource;
use Services\Lp3Core\App\Models\InspectionType;

/**
 * 船会社の一覧の取得リソース
 */
class StoreResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'regionId' => $this->resource->region_id,
            'createdAt' => $this->resource->created_at,
            'createdBy' => $this->resource->created_by,
            'updatedAt' => $this->resource->updated_at,
            'updatedBy' => $this->resource->updated_by,
            'deletedAt' => $this->resource->deleted_at,
            'deletedBy' => $this->resource->deleted_by,
            'requiredInspections' => $this->resource->requiredInspections->isNotEmpty() ? $this->resource->requiredInspections->map(function (InspectionType $type) {
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
            'region' => $this->resource->region ? [
                'id' => $this->resource->region->id,
                'name' => $this->resource->region->name,
                'createdAt' => $this->resource->region->created_at,
                'createdBy' => $this->resource->region->created_by,
                'updatedAt' => $this->resource->region->updated_at,
                'updatedBy' => $this->resource->region->updated_by,
                'deletedAt' => $this->resource->region->deleted_at,
                'deletedBy' => $this->resource->region->deleted_by,
            ] : null
        ];
    }
}
