<?php

namespace Services\Lp3Cargo\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Cargo\Database\Factories\CarBrandFactory;
use Services\Lp3Cargo\App\Models\CarModel;

/**
 * 自動車ブランドモデル
 * @property $id
 * @property $name
 */
class CarBrand extends Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    // リレーション
    public function car_model()
    {
        return $this->hasMany(CarModel::class);
    }

    protected static function newFactory()
    {
        return CarBrandFactory::new();
    }
}
