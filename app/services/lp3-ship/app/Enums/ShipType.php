<?php

namespace Services\Lp3Ship\App\Enums;

/**
 * 本船種別
 */

enum ShipType: int
{
        # ※数字はDB上での値です。
    case CONTAINER_SHIP = 1;  # コンテナ船
    case RORO_SHIP = 2;       # RORO船
    case CONRO_SHIP = 3;      # ConRO船

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            ShipType::CONTAINER_SHIP => 'コンテナ船',
            ShipType::RORO_SHIP => 'RORO船',
            ShipType::CONRO_SHIP => 'ConRO船',
        };
    }
}
