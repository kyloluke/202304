<?php

namespace Services\Lp3Core\App\Http\Resources\Region;

use Services\Lp3Core\App\Http\Resources\ResourceCollection;
use Services\Lp3Core\App\Models\Region;

/**
 * 地域の一覧のリソースコレクション
 */
class IndexResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->resource->map(function (Region $region) {
            return [
                'id' => $region->id,
                'name' => $region->name,
                'createdAt' => $region->created_at,
                'createdBy' => $region->created_by,
                'updatedAt' => $region->updated_at,
                'updatedBy' => $region->updated_by,
                'deletedAt' => $region->deleted_at,
                'deletedBy' => $region->deleted_by,
            ];
        });
    }
}
