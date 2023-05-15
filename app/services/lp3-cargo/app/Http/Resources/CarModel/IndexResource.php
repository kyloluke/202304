<?php

namespace Services\Lp3Cargo\App\Http\Resources\CarModel;

use Services\Lp3Cargo\App\Http\Resources\Resource as BaseResource;

/**
 * 車種のIndexAPIリソース
 */
class IndexResource extends BaseResource
{
    /**
     * @see Resource::toArray()
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nameEn' => $this->name_en,
            'updatedBy' => $this->updated_by,
            'createdBy' => $this->created_by,
            'updatedAt' => $this->updated_at,
            'createdAt' => $this->created_at,
            'carBrand' => [
                'id' => $this->carBrand->id,
                'name' => $this->carBrand->name,
                'nameEn' => $this->carBrand->name_en,
            ],
        ];
    }
}
