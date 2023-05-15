<?php

namespace Services\Lp3Ship\App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Services\Lp3Ship\Database\Factories\ShipScheduleFactory;
use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * モデルの基底クラス
 */
class ShipSchedule extends Model
{
    use SoftDeletes, HasFactory, AuthorObservable;

    protected $table = 'ship_schedules';

    protected static function newFactory()
    {
        return ShipScheduleFactory::new();
    }

    public function shipCompany(): BelongsTo
    {
        return $this->belongsTo(ShipCompany::class, 'ship_company_id', 'id');
    }

    public function ship(): BelongsTo
    {
        return $this->belongsTo(Ship::class, 'ship_id', 'id');
    }

    public function scheduleItems(): HasMany
    {
        return $this->hasMany(ShipScheduleItem::class, 'ship_schedule_id', 'id')->orderBy('id');
    }

    public function scopeWhereShipIdSearch($query, string $val)
    {
        return $query->where('ship_id', $val);
    }

    public function scopeWhereShipCompanyIdSearch($query, string $val)
    {
        return $query->where('ship_company_id', $val);
    }

    public function scopeWhereVoyageNumberSearch($query, string $val, bool $like = true)
    {
        if ($like)
            return $query->where('voyage_number', 'like', '%' . $val . '%');

        return $query->where('voyage_number', '=', $val);
    }

    public function scopeWherePodPortIdSearch($query, string $val)
    {
        return $query->whereHas('scheduleItems', function ($q) use ($val) {
            $q->where('pod_port_id', $val);
        });
    }

    public function scopeWherePolPortIdSearch($query, string $val)
    {
        return $query->whereHas('scheduleItems', function ($q) use ($val) {
            $q->where('pol_port_id', $val);
        });
    }

    public function scopeWhereCyCutAtSearch($query, string $val)
    {
        return $query->whereHas('scheduleItems', function ($q) use ($val) {
            $q->Where('cy_cut_at', '>', $val);
        });
    }

    public function scopeWhereDocumentCutAtSearch($query, string $val)
    {
        return $query->whereHas('scheduleItems', function ($q) use ($val) {
            $q->Where('document_cut_at', '>', $val);
        });
    }

    public function getItemIds()
    {
        return $this->scheduleItems()->pluck('id');
    }

}
