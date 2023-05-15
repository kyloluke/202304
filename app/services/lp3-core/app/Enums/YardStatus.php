<?php

namespace Services\Lp3Core\App\Enums;

/**
 * ヤードステータス
 */

enum YardStatus: int
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
            YardStatus::ENABLE => '有効',
            YardStatus::DISABLE => '無効',
        };
    }
}
