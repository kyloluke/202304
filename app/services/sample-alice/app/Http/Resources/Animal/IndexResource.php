<?php

namespace Services\SampleAlice\App\Http\Resources\Animal;

use Services\SampleAlice\App\Http\Resources\Resource;

/**
 * 動物の一覧の取得リソース
 */
class IndexResource extends Resource
{
    /**
     * @see Resource::toArray()
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
