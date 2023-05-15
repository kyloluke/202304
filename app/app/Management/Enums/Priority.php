<?php

namespace App\Management\Enums;

/**
 * 優先度
 */
enum Priority
{
    case Low;
    case High;

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            Priority::Low => '低',
            Priority::High => '高',
        };
    }
}
