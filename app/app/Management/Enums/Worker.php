<?php

namespace App\Management\Enums;

/**
 * 作業者
 */
enum Worker
{
    case Sync;
    case SyncObuchi;

    case Avante;
    case AvanteMurata;
    case AvanteHara;
    case AvanteBaba;
    case AvanteTakamatsu;
    case AvanteAizawa;
    case AvanteSato;
    case AvanteAikyo;
    case AvanteKihira;
    case AvanteFujisaki;
    case AvanteSong;
    case AvanteTsuruoka;
    case AvanteNakajima;
    case AvanteLu;

    case Creer;
    case CreerSato;
    case CreerKawano;

    case Clabel;

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::Sync => 'SYNC',
            self::SyncObuchi => 'SYNC大淵',

            self::Avante => 'AVANTE',
            self::AvanteMurata => 'AVANTE村田',
            self::AvanteHara => 'AVANTE原',
            self::AvanteBaba => 'AVANTE馬場',
            self::AvanteTakamatsu => 'AVANTE髙松',
            self::AvanteAizawa => 'AVANTE相澤',
            self::AvanteSato => 'AVANTE佐藤',
            self::AvanteAikyo => 'AVANTE相京',
            self::AvanteKihira => 'AVANTE紀平',
            self::AvanteFujisaki => 'AVANTE藤崎',
            self::AvanteSong => 'AVANTE宋',
            self::AvanteTsuruoka => 'AVANTE鶴岡',
            self::AvanteNakajima => 'AVANTE中嶋',
            self::AvanteLu => 'AVANTE路',

            self::Creer => 'CREER',
            self::CreerSato => 'CREER佐藤',
            self::CreerKawano => 'CREER川野',

            self::Clabel => 'CLABEL',
        };
    }
}
