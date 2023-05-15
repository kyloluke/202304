<?php

namespace App\Management\Models;

/**
 * 車両写真の種類
 */
enum ChassisPhotoType
{
    case CarryIn; //搬入写真
    case Product; //商品写真
    case EasyWork; // 軽作業
}
