<?php

namespace Services\Lp3Ship\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Ship\Database\Factories\ContShipScheduleFactory;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Models\ShipCompany;

/**
 * コンテナ船スケジュールモデル
 */
class ContShipSchedule extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return ContShipScheduleFactory::new();
    }
}
