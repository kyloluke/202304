<?php

namespace Services\Lp3Ship\App\Http\Resources\Ship;

use Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Http\Resources\Resource;

/**
 * Ship用の共通リソースクラス
 */
class ShipCommonResource extends Resource
{
    /**
     * @see Resource::toArray()
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'typeLabel' => ShipType::from($this->type)->label(),
        ];
    }
}
