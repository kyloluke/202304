<?php

namespace App\Management\Apis\Enums;

/**
 * 進捗
 */
enum Progress
{
    case NotCreated;
    case Creating;
    case Created;

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::NotCreated => '未作成',
            self::Creating => '作成中',
            self::Created => '作成済',
        };
    }
}
