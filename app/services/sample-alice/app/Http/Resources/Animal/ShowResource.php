<?php

namespace Services\SampleAlice\App\Http\Resources\Animal;

use Services\SampleAlice\App\Http\Resources\Resource;

/**
 * 動物の詳細の取得リソース
 */
class ShowResource extends Resource
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
