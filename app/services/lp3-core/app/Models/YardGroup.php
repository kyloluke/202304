<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\Database\Factories\YardGroupFactory;

/**
 * ヤードグループモデル
 * @property $id
 * @property $name
 * @property $representative_yard_id
 * @property $reception_time_weekdays_from
 * @property $reception_time_weekdays_to
 * @property $reception_time_saturday_from
 * @property $reception_time_saturday_to
 * @property $rest_time_from
 * @property $rest_time_to
 * @property $default_pol_id
 * @property $organization_id
 */
class YardGroup extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return YardGroupFactory::new();
    }

    public function yards()
    {
        return $this->hasMany(Yard::class, 'yard_group_id', 'id');
    }

    public function regularHolidays()
    {
        return $this->hasMany(YardGroupRegularHolidays::class, 'yard_group_id', 'id');
    }

    public function irregularHolidays()
    {
        return $this->hasMany(YardGroupIrregularHolidays::class, 'yard_group_id', 'id');
    }

    public function irregularBusinessDays()
    {
        return $this->hasMany(YardGroupIrregularBusinessDays::class, 'yard_group_id', 'id');
    }

    public function defaultPol()
    {
        return $this->belongsTo(Port::class, 'default_pol_id', 'id');
    }

    public function representativeYard()
    {
        return $this->belongsTo(Yard::class, 'representative_yard_id', 'id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function staffs()
    {
        return $this->belongsToMany(User::class, 'yard_group_staff', 'yard_group_id', 'user_id')->withTimestamps();
    }

    public function managers()
    {
        return $this->belongsToMany(User::class, 'yard_group_manager', 'yard_group_id', 'user_id')->withTimestamps();
    }

    // 業態別のデフォルト作業所については、業態-作業所のModel(OfficeBusinessTypes)を用いて表現している。
    // 取得できるデータは業態別になっていないため、業態別の作業所リストはResourceで作成する。
    public function officeBusinessTypes()
    {
        return $this->belongsToMany(OfficeBusinessTypes::class, 'yard_group_office_business_type', 'yard_group_id', 'office_business_types_id')->withTimestamps();
    }

    public function scopeWhereNames($query, $keywords)
    {
        $query->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('name',  'LIKE', '%' .  $keyword . '%');
            }
        });

        $query->orWhere(function ($query) use ($keywords) {
            return $query->whereHas('yards', function ($query) use ($keywords) {
                return $query->where(function ($query) use ($keywords) {
                    foreach ($keywords as $keyword) {
                        $query->orWhere('name_jp',  'LIKE', '%' .  $keyword . '%');
                        $query->orWhere('name_en',  'LIKE', '%' .  $keyword . '%');
                    }
                });
            });
        });

        return $query;
    }


    public function scopeWhereYardStatus($query, $yardStatus)
    {
        return $query->whereHas('yards', function ($query) use ($yardStatus) {
            return $query->where('status', $yardStatus);
        });
    }

    public function scopeWhereYardCapacities($query, $capacities)
    {
        return $query->whereHas('yards', function ($query) use ($capacities) {
            return $query->whereIn('capacity', $capacities);
        });
    }

    public function scopeWhereYardMails($query, $keywords)
    {
        return $query->whereHas('yards', function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $query->orWhere('mail',  'LIKE', '%' .  $keyword . '%');
            }
            return $query;
        });
    }

    public function scopeWhereDefaultCustomBrokerOfficeId($query, $officeId)
    {
        return $query->whereHas('officeBusinessTypes', function ($query) use ($officeId) {
            $query->where('business_type',  BusinessType::CUSTOM_BROKER->value);
            $query->where('office_id',  '=', $officeId);
            return $query;
        });
    }
}
