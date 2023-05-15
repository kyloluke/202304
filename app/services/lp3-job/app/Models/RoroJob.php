<?php

namespace Services\Lp3Job\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Job\Database\Factories\RoroJobFactory;

/**
 * ROROJOBモデル
 */
class RoroJob extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return RoroJobFactory::new();
    }
}
