<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Services\Lp3Core\Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 国モデル
 * @property $id
 * @property $name
 * @property $region_id
 */
class Country extends Model
{
    use SoftDeletes, HasFactory, AuthorObservable;

    protected $table = 'countries';

    protected static function newFactory()
    {
        return CountryFactory::new();
    }

    public function requiredInspections(): BelongsToMany
    {
        return $this->belongsToMany(InspectionType::class, 'country_required_inspections', 'country_id', 'inspection_type_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function yards()
    {
        return $this->hasMany(Yard::class, 'country_id', 'id');
    }

    public function ports()
    {
        return $this->hasMany(Port::class, 'country_id', 'id');
    }
}
