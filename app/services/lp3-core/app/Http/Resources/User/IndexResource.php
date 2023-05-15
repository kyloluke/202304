<?php

namespace Services\Lp3Core\App\Http\Resources\User;

use Services\Lp3Core\App\Http\Resources\Resource as BaseResource;

/**
 * ユーザーのIndexAPIリソース
 */
class IndexResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
