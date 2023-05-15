<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\OfficeFactory;

/**
 * 事業所モデル
 * 
 * @property $name_jp
 * @property $name_en
 * @property $remarks
 * @property $status
 * @property $country_id
 * @property $zip_code
 * @property $state_jp
 * @property $state_en
 * @property $city_jp
 * @property $city_en
 * @property $address1_jp
 * @property $address1_en
 * @property $address2_jp
 * @property $address2_en
 * @property $address3_jp
 * @property $address3_en
 * @property $timezone
 * @property $organization_id
 */
class Office extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return OfficeFactory::new();
    }

    public function officeMails()
    {
        return $this->hasMany(OfficeMails::class, 'office_id', 'id');
    }

    public function officeTelephones()
    {
        return $this->hasMany(OfficeTelephones::class, 'office_id', 'id');
    }

    public function officeFaxes()
    {
        return $this->hasMany(OfficeFaxes::class, 'office_id', 'id');
    }

    public function officeNotificationSettings()
    {
        return $this->hasMany(OfficeNotificationSettings::class, 'office_id', 'id');
    }

    public function officeBusinessTypes()
    {
        return $this->hasMany(OfficeBusinessTypes::class, 'office_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'office_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

    public function scopeWhereBusinessType($query, $businessType)
    {
        return $query->where('office_business_types.business_type', '=', $businessType);
    }
}
