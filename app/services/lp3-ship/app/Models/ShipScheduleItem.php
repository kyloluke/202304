<?php

namespace Services\Lp3Ship\App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Services\Lp3Ship\Database\Factories\ShipScheduleItemFactory;
use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Services\Lp3Ship\Refers\Models\Port;
use Services\Lp3Ship\Refers\Models\Destination;

/**
 * モデルの基底クラス
 */
class ShipScheduleItem extends Model
{
    use SoftDeletes, HasFactory, AuthorObservable;

    protected $table = 'ship_schedule_items';

    protected static function newFactory()
    {
        return ShipScheduleItemFactory::new();
    }

    public function polPort(): BelongsTo
    {
        return $this->belongsTo(Port::class, 'pol_port_id', 'id');
    }

    public function podPort(): BelongsTo
    {
        return $this->belongsTo(Port::class, 'pod_port_id', 'id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class, 'fd_id', 'id');
    }
}
