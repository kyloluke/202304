<?php

namespace App\Management\Screens\Enums;

/**
 * 画面イメージの進捗
 */
enum ScreenImageProgress
{
    case Unnecessary;
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
            self::Unnecessary => '不要',
            self::NotCreated => '未着手',
            self::Creating => '画面設計中',
            self::Created => '画面設計完了',
        };
    }
}
