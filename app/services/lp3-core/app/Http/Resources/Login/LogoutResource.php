<?php

namespace Services\Lp3Core\App\Http\Resources\Login;

use Services\Lp3Core\App\Http\Resources\Resource;

/**
 * ログアウトリソース
 */
class LogoutResource extends Resource
{
    /**
     * @see Resource::toArray()
     */
    public function toArray($request)
    {
        return [
            'success' => $this->resource,
        ];
    }
}
