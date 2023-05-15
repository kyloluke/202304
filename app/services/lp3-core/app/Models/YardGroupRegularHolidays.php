<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\YardGroupRegularHolidaysFactory;

/**
 * ヤードグループの定休日モデル
 * @property $id
 * @property $yard_group_id
 * @property $start_date
 * @property $end_date
 * @property $monday_flg
 * @property $tuesday_flg
 * @property $wednesday_flg
 * @property $thursday_flg
 * @property $friday_flg
 * @property $saturday_flg
 * @property $sunday_flg
 * @property $national_holidays_flg
 */
class YardGroupRegularHolidays extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return YardGroupRegularHolidaysFactory::new();
    }

    public function yardGroup()
    {
        return $this->belongsTo(YardGroup::class, 'yard_group_id', 'id');
    }
}
