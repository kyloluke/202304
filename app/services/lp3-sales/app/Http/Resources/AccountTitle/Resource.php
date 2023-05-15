<?php

namespace Services\Lp3Sales\App\Http\Resources\AccountTitle;

use Services\Lp3Sales\App\Http\Resources\Resource as BaseResource;

/**
 * 勘定科目のAPIリソース
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
            'name_en' => $this->name_en,
            'code' => $this->code,
            'available' => $this->available,
            'ordinary' => $this->ordinary
        ];
    }
}
