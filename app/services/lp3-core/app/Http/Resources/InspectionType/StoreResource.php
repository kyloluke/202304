<?php

namespace Services\Lp3Core\App\Http\Resources\InspectionType;

use Services\Lp3Core\App\Http\Resources\Resource;

/**
 * 検査種別の作成のリソース
 */
class StoreResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'createdAt' => $this->resource->created_at,
            'createdBy' => $this->resource->created_by,
            'updatedAt' => $this->resource->updated_at,
            'updatedBy' => $this->resource->updated_by,
            'deletedAt' => $this->resource->deleted_at,
            'deletedBy' => $this->resource->deleted_by,
        ];
    }
}
