<?php

namespace Services\Lp3Core\App\Enums;

/**
 * 事業所ステータス
 */

enum OfficeStatus: int
{
    case ENABLE = 1;  # 有効
    case DISABLE = 2; # 無効

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            OfficeStatus::ENABLE => '有効',
            OfficeStatus::DISABLE => '無効',
        };
    }
}
