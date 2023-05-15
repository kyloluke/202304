<?php

namespace Services\Lp3Core\App\Http\Resources\Login;

use Services\Lp3Core\App\Http\Resources\Resource;

/**
 * ログインリソース
 */
class LoginResource extends Resource
{
    /**
     * @see Resource::toArray()
     */
    public function toArray($request)
    {
        return [
            'token' => $this->resource,
        ];
    }
}
