<?php

namespace App\Management\Models;

/**
 * 車輌写真
 */
class ChassisPhoto
{
    public ChassisPhotoType $type;
    public $rotate; // @todo 回転or向き
    public $ordinary; // 順番

    /**
     * 権限制御
     *
     * @return bool
     */
    public function authorityControl(): bool
    {
        //車輌写真の権限制御はすべての車両写真の種類で共通とする(=車輌写真の種類毎に権限制御を定義する必要はない)

        return false;
    }
}
