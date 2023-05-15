<?php

namespace Services\Lp3Core\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Core\Database\Factories\HolidayFactory;

/**
 * 祝日モデル
 */
class Holiday extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return HolidayFactory::new();
    }
}
