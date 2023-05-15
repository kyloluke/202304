<?php

namespace App\Http\Resources;

/**
 * リソースコレクションの基底クラス
 */
class ResourceCollection extends \Illuminate\Http\Resources\Json\ResourceCollection
{
    /**
     * @see \Illuminate\Http\Resources\Json\ResourceCollection::toArray()
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
