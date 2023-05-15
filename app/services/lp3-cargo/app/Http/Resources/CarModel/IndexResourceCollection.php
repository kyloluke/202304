<?php

namespace Services\Lp3Cargo\App\Http\Resources\CarModel;

use Services\Lp3Cargo\App\Http\Resources\ResourceCollection as BaseResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\CarModel\IndexResource;

/**
 * 車種のリソースコレクション
 */
class IndexResourceCollection extends BaseResourceCollection
{
    /**
     * @see \Illuminate\Http\Resources\Json\ResourceCollection::toArray()
     */
    public function toArray($request)
    {
        return [
            'data' => IndexResource::collection($this->collection),
        ];
    }
}
