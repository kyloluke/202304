<?php

namespace Services\Lp3Core\App\Enums;

/**
 * システム利用形態
 */
enum SystemUsage: int
{
    case ADMINISTRATION = 1;  # 管理
    case MANAGEMENT = 2;      # 運営
    case OSL = 3;             # OSL利用
    case GENERAL = 4;         # 一般利用

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            SystemUsage::ADMINISTRATION => '管理',
            SystemUsage::MANAGEMENT => '運営',
            SystemUsage::OSL => 'OSL利用',
            SystemUsage::GENERAL => '一般利用',
        };
    }
}
