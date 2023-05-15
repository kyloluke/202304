<?php

namespace Services\Lp3Core\App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\AuthorObservable;
use Services\Lp3Core\Database\Factories\RegionFactory;

class Region extends Model
{
    use SoftDeletes, HasFactory, AuthorObservable;

    protected $table = 'regions';

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class, 'region_id', 'id')->orderBy('id');
    }

    protected static function newFactory()
    {
        return RegionFactory::new();
    }
}
