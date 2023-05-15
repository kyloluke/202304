<?php

namespace Services\Lp3Core\App\Enums;

/**
 * ロケーション種別
 */

enum LocationType: int
{
    case PORT = 1;          # 港
    case DESTINATION = 2;   # 仕向地

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            LocationType::PORT => '港',
            LocationType::DESTINATION => '仕向地',
        };
    }
}
