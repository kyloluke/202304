<?php

namespace Services\Lp3Cargo\App\Http\Resources\CarBrand;

use Services\Lp3Cargo\App\Http\Resources\Resource as BaseResource;

/**
 * 自動車ブランドのAPIリソース
 */
class Resource extends BaseResource
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
        ];
    }
}
