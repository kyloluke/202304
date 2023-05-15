<?php

namespace Services\Lp3Core\App\Enums;

/**
 * 港種別
 */

enum PortType: int
{
    case POL = 1; # 積港
    case POD = 2; # 揚港

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            PortType::POL => '積港',
            PortType::POD => '揚港',
        };
    }
}
