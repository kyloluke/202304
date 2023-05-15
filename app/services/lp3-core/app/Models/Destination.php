<?php

namespace Services\Lp3Core\App\Models;

use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\Database\Factories\DestinationFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Destination extends Location
{
    protected static function booted()
    {
        static::addGlobalScope('destinationOnly', function (Builder $builder) {
            $builder->where('location_type', LocationType::DESTINATION->value);
        });
    }

    protected static function newFactory()
    {
        return DestinationFactory::new();
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
