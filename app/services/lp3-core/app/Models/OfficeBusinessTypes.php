<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\OfficeBusinessTypesFactory;

/**
 * 事業所と業態のリレーションモデル
 * @property $id
 * @property $office_id
 * @property $business_type
 */
class OfficeBusinessTypes extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return OfficeBusinessTypesFactory::new();
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }

    public function yardGroups()
    {
        return $this->belongsToMany(YardGroup::class, 'yard_group_office_business_type', 'office_business_types_id',  'yard_group_id')->withTimestamps();
    }
}
