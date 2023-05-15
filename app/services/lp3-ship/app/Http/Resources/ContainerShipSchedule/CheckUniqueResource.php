<?php

namespace Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule;

use Services\Lp3Ship\App\Http\Resources\Resource as BaseResource;

/**
 * コンテナ船スケジュールのユニックチェック　リソース
 */
class CheckUniqueResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'success' => $this->resource
        ];
    }
}
