<?php

namespace Services\Lp3Core\App\Models;


use Illuminate\Database\Eloquent\Builder;
use Services\Lp3Core\App\Enums\LocationType;
use Services\Lp3Core\Database\Factories\PortFactory;

/**
 * 港モデル
 * @property $id
 * @property $name
 * @property $country_id
 * @property $zipcode
 * @property $state_jp
 * @property $state_en
 * @property $city_jp
 * @property $city_en
 * @property $address1_jp
 * @property $address2_jp
 * @property $address3_jp
 * @property $address1_en
 * @property $address2_en
 * @property $address3_en
 * @property $timezone
 * @property $naccs_code
 * @property $unlo_code
 * @property $require_local_agent
 * @property $type
 */
class Port extends Location
{
    protected static function newFactory()
    {
        return PortFactory::new();
    }

    protected static function booted()
    {
        static::addGlobalScope('portOnly', function (Builder $builder) {
            $builder->where('location_type', LocationType::PORT->value);
        });
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function yardGroups()
    {
        return $this->hasMany(YardGroup::class, 'default_pol_id', 'id');
    }
}
