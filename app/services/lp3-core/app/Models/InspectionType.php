<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\InspectionTypeFactory;

class InspectionType extends Model
{
    use SoftDeletes, HasFactory, AuthorObservable;

    protected $table = 'inspection_types';

    protected static function newFactory()
    {
        return InspectionTypeFactory::new();
    }

    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class, 'country_inspection_types', 'inspection_type_id', 'country_id');
    }
}

