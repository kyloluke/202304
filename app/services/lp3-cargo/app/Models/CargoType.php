<?php

namespace Services\Lp3Cargo\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Cargo\Database\Factories\CargoTypeFactory;

/**
 * 貨物種類モデル
 */
class CargoType extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected static function newFactory()
    {
        return CargoTypeFactory::new();
    }
}
