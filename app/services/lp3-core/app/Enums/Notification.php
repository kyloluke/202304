<?php

namespace Services\Lp3Core\App\Enums;

/**
 * 通知設定
 */

enum Notification: int
{
    case CONTAINER_PHOTO = 1;    # コンテナ写真
    case DOCK_RECEIPT = 2;       # DR
    case SHIPPING_ORDER = 3;     # SO
    case EXPORT_DECLARATION = 4; # ED

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            Notification::CONTAINER_PHOTO => 'コンテナ写真',
            Notification::DOCK_RECEIPT => 'DR',
            Notification::SHIPPING_ORDER => 'SO',
            Notification::EXPORT_DECLARATION => 'ED',
        };
    }
}
