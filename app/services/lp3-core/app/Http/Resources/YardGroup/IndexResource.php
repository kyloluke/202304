<?php

namespace Services\Lp3Core\App\Http\Resources\YardGroup;

use Services\Lp3Core\App\Http\Resources\YardGroup\YardResourceForYardGroup;
use Services\Lp3Ship\App\Http\Resources\Resource as BaseResource;

/**
 * ヤードグループの一覧取得のリソースクラス
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
            "yards" => $this->yards->map(function ($yard) use ($request) {
                return (new YardResourceForYardGroup($yard))->toArray($request);
            }),
            "representativeYard" => !empty($this->representativeYard) ? (new YardResourceForYardGroup($this->representativeYard))->toArray($request) : [],
        ];
    }
}
