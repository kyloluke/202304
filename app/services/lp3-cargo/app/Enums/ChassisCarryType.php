<?php

namespace Services\Lp3Cargo\App\Enums;

/**
 * 貨物アクティビティ種別
 */
enum ChassisCarryType: int
{
    case CARRY_IN           = 1;      # 搬入（通常の搬入、内貨搬入、一時搬出戻りを含む）
    case DOMESTIC_OUT       = 2;      # 内貨搬出
    case DOMESTIC_RETURN    = 3;      # 内貨戻し
    case TEMP_OUT           = 4;      # 一時搬出
    case CARRY_OUT          = 5;      # 搬出（外貨搬出、GODOWNの間も含む、本船スケジュールによる推定で生成されるアクティブ）


    /**
     * ラベルを取得する
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            ChassisCarryType::CARRY_IN => '搬入（通常の搬入、内貨搬入、一時搬出戻りを含む）',
            ChassisCarryType::DOMESTIC_OUT => '内貨搬出',
            ChassisCarryType::DOMESTIC_RETURN => '内貨戻し',
            ChassisCarryType::TEMP_OUT => '一時搬出',
            ChassisCarryType::CARRY_OUT => '搬出（外貨搬出、GODOWNの間も含む、本船スケジュールによる推定で生成されるアクティブ）',
        };
    }
}
