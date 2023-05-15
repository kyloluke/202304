<?php

namespace Services\Lp3Ship\App\Enums;

/**
 * 本船スケジュール種別
 */
enum ShipScheduleType: int
{
    # ※数字はDB上での値です。
    case CONTAINER_SHIP = 1;  # コンテナ船
    case RORO_SHIP = 2;       # RORO船

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            ShipScheduleType::CONTAINER_SHIP => 'コンテナ船',
            ShipScheduleType::RORO_SHIP => 'RORO船',
        };
    }
}
