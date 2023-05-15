<?php

namespace Services\Lp3Core\App\Http\Resources\Office;

use Services\Lp3Core\App\Http\Resources\Resource as BaseResource;

/**
 * 事業所のIndexAPIリソース
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
            'status' => $this->status
        ];
    }
}
