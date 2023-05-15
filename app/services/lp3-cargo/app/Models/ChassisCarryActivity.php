<?php

namespace Services\Lp3Cargo\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Cargo\Database\Factories\ChassisCarryActivityFactory;
use Services\Lp3Cargo\Refers\Models\Yard;

/**
 * 車輌アクティビティ履歴モデル
 */
class ChassisCarryActivity extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected $casts = [];

    // 車両
    public function chassis()
    {
        return $this->belongsTo(Chassis::class, 'chassis_id');
    }

    public function yard()
    {
        return $this->belongsTo(Yard::class, 'yard_id');
    }

    protected static function newFactory()
    {
        return ChassisCarryActivityFactory::new();
    }
}
