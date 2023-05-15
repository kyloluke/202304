<?php

namespace Services\Lp3Ship\App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Ship\Refers\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Services\Lp3Ship\Database\Factories\ShipCompanyFactory;
use App\Models\Traits\AuthorObservable;

/**
 * モデルの基底クラス
 */
class ShipCompany extends Model
{
    use SoftDeletes, HasFactory, AuthorObservable;

    protected $table = 'ship_companies';

    function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    protected static function newFactory()
    {
        return ShipCompanyFactory::new();
    }

    public function scopeWhereKeyWordSearch($query, string $val)
    {
        return $query->where('name', 'like', '%' . $val . '%');
    }

}
