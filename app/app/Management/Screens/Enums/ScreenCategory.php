<?php

namespace App\Management\Screens\Enums;

/**
 * 画面カテゴリー
 */
enum ScreenCategory
{
    case Login;
    case Chassis;
    case ShipSchedule;
    case ContainerJob;
    case RoroJob;
    case JobCommon;
    case Billing;
    case Sales;
    case Master;
    case Master2; // @todo 名前良いのを考える
    case Statistics;
    case Misc;

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::Login => 'ログイン',
            self::Chassis => '車輌',
            self::ShipSchedule => '本船スケジュール',
            self::ContainerJob => 'コンテナJOB',
            self::RoroJob => 'ROROJOB',
            self::JobCommon => 'JOB共通',
            self::Billing => '請求',
            self::Sales => '販売管理',
            self::Master => 'マスター',
            self::Master2 => 'マスター2',
            self::Statistics => '統計情報',
            self::Misc => 'その他',
        };
    }

    /**
     * 順序を取得する
     */
    public function ordinary(): int|null
    {
        return match ($this) {
            self::Login => 1,
            self::Chassis => 2,
            self::ShipSchedule => 3,
            self::ContainerJob => 4,
            self::RoroJob => 5,
            self::JobCommon => 6,
            self::Billing => 7,
            self::Sales => 8,
            self::Master => 9,
            self::Master2 => 10,
            self::Statistics => 11,
            self::Misc => 12,
        };
    }
}
