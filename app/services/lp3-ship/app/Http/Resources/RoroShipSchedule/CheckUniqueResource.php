<?php

namespace Services\Lp3Ship\App\Http\Resources\RoroShipSchedule;

use Services\Lp3Ship\App\Http\Resources\Resource as BaseResource;

/**
 * RORO船スケジュールのユニックチェック　リソース
 */
class CheckUniqueResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'success' => $this->resource,
        ];
    }
}
