<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\YardGroupIrregularBusinessDaysFactory;

/**
 * ヤードグループの臨時営業日モデル
 * @property $id
 * @property $date
 * @property $yard_group_id
 */
class YardGroupIrregularBusinessDays extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return YardGroupIrregularBusinessDaysFactory::new();
    }

    public function yardGroup()
    {
        return $this->belongsTo(YardGroup::class, 'yard_group_id', 'id');
    }
}
