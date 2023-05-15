<?php

namespace Services\Lp3Cargo\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Cargo\Database\Factories\CarModelFactory;
use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * 車種モデル
 * @property $id
 * @property $name
 */
class CarModel extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    // リレーション
    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id');
    }

    protected static function newFactory()
    {
        return CarModelFactory::new();
    }
}
