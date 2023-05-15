<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * リソースの基底クラス
 */
class Resource extends JsonResource
{
    // JSONのキーは camelCase にするようにしてください

    /**
     * @see JsonResource::toArray()
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
