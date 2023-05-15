<?php

namespace App\Management\Apis\Enums;

/**
 * APIカテゴリー
 */
enum ApiCategory
{
    case ExlBfwdFtp;
    case ExlInttra;
    case ExlSyncBanc;
    case ExlSyncDp; // データポータル
    case ExlSyncFtp;
    case ExlSyncMetabase;
    case ExlSyncWeb;
    case Lp2;
    case Lp3Bi;
    case Lp3Cargo;
    case Lp3Core;
    case Lp3Job;
    case Lp3Sales;
    case Lp3Ship;

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::ExlBfwdFtp => 'exl-bfwd-ftp',
            self::ExlInttra => 'exl-inttra',
            self::ExlSyncBanc => 'exl-sync-banc',
            self::ExlSyncDp => 'exl-sync-dp',
            self::ExlSyncFtp => 'exl-sync-ftp',
            self::ExlSyncMetabase => 'exl-sync-metabase',
            self::ExlSyncWeb => 'exl-sync-web',
            self::Lp2 => 'lp2',
            self::Lp3Bi => 'lp3-bi',
            self::Lp3Cargo => 'lp3-cargo',
            self::Lp3Core => 'lp3-core',
            self::Lp3Job => 'lp3-job',
            self::Lp3Sales => 'lp3-sales',
            self::Lp3Ship => 'lp3-ship',
        };
    }

    /**
     * 順序を取得する
     */
    public function ordinary(): int|null
    {
        return match ($this) {
            self::Lp3Core => 1,
            self::Lp3Cargo => 2,
            self::Lp3Ship => 3,
            self::Lp3Job => 4,
            self::Lp3Sales => 5,
            self::Lp3Bi => 6,
            default => null,
        };
    }
}
