<?php

namespace App\Management\Screens\Enums;

/**
 * β版のViewの進捗
 */
enum BetaViewProgress
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
            self::Creating => 'モック作成中',
            self::Created => 'モック作成完了',
        };
    }
}
