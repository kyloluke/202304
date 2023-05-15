<?php

namespace Services\Lp3Core\App\Enums;

/**
 * タイムゾーン
 */
enum TimeZone: string
{
    case UTC = 'UTC';                              // 協定世界時
    case ASIA_TOKYO = 'Asia/Tokyo';                // 日本標準時
    case ASIA_KARACHI = 'Asia/Karachi';            // パキスタン時間
    case AMERICA_NEWYORK = 'America/New_York';     // 東部標準時
}
