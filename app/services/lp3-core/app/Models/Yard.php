<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\YardFactory;
use Services\Lp3Core\Refers\Models\CargoType;

/**
 * ヤードモデル
 * @property $id
 * @property $name_jp
 * @property $name_en
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
 * @property $naccs_bonded_area_code
 * @property $mail
 * @property $telephone
 * @property $person_in_charge_jp
 * @property $person_in_charge_en
 * @property $capacity
 * @property $cc_when_carry_in_cy
 * @property $name_web
 * @property $map_url_web
 * @property $transport_method_web
 * @property $status
 * @property $yard_group_id
 */
class Yard extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return YardFactory::new();
    }

    public function representativeInYardGroup()
    {
        return $this->hasOne(YardGroup::class, 'representative_yard_id', 'id');
    }

    public function cargoTypes()
    {
        return $this->belongsToMany(CargoType::class, 'yard_cargo_type', 'yard_id', 'cargo_type_id')->withTimestamps()->withPivot('created_by', 'updated_by');
    }

    public function yardGroup()
    {
        return $this->belongsTo(YardGroup::class, 'yard_group_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    // @todo User周りの改修が完了したら紐づける。
    // public function updater()
    // {
    //     return $this->belongsTo(User::class, 'updated_by', 'id');
    // }

    public function scopeWhereNames($query, $keywords)
    {
        $query->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('name_jp',  'LIKE', '%' .  $keyword . '%');
                $query->orWhere('name_en',  'LIKE', '%' .  $keyword . '%');
            }
        });

        $query->orWhere(function ($query) use ($keywords) {
            return $query->whereHas('yardGroup', function ($query) use ($keywords) {
                return $query->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('name',  'LIKE', '%' .  $keyword . '%');
                    }
                });
            });
        });

        return $query;
    }
}
