<?php

namespace Services\Lp3Core\App\Enums;

/**
 * 業態
 */
enum BusinessType: int
{
    case CUSTOM_BROKER = 1;   # 通関業者
    case CARGO_LOADER = 2;    # 船積作業会社
    case STOCK_MANAGER = 3;   # 在庫管理会社
    case WAREHOUSE_OWNER = 4; # 蔵主
    case FORWARDER = 5;       # フォワーダー
    case SHIPPER = 6;         # 荷主
    case DRAYAGER = 7;        # ドレー業者
    case LOCAL_AGENT = 8;     # 現地代理店
    case BOOKING_AGENT = 9;   # ブッキングエージェント

    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            BusinessType::CUSTOM_BROKER => '通関業者',
            BusinessType::CARGO_LOADER => '船積作業会社',
            BusinessType::STOCK_MANAGER => '在庫管理会社',
            BusinessType::WAREHOUSE_OWNER => '蔵主',
            BusinessType::FORWARDER => 'フォワーダー',
            BusinessType::SHIPPER => '荷主',
            BusinessType::DRAYAGER => 'ドレー業者',
            BusinessType::LOCAL_AGENT => '現地代理店',
            BusinessType::BOOKING_AGENT => 'ブッキングエージェント'
        };
    }

    /**
     * ヤードグループ用の値を取得する
     * @return array
     */
    public static function getValuesForYardGroup(): array
    {
        return [
            BusinessType::CUSTOM_BROKER->value,
            BusinessType::CARGO_LOADER->value,
            BusinessType::STOCK_MANAGER->value,
            BusinessType::WAREHOUSE_OWNER->value,
            BusinessType::DRAYAGER->value,
        ];
    }
}
