<?php

namespace Services\Lp3Core\App\Http\Resources\InspectionType;

use Services\Lp3Core\App\Http\Resources\ResourceCollection;
use Services\Lp3Core\App\Models\InspectionType;

/**
 * 検索種別の一覧の取得リソースコレクション
 */
class IndexResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->resource->map(function (InspectionType $type) {
            return [
                'id' => $type->id,
                'name' => $type->name,
                'createdAt' => $type->created_at,
                'createdBy' => $type->created_by,
                'updatedAt' => $type->updated_at,
                'updatedBy' => $type->updated_by,
                'deletedAt' => $type->deleted_at,
                'deletedBy' => $type->deleted_by,
            ];
        });

    }
}
