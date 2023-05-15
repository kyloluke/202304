<?php

namespace Services\SampleAlice\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Services\SampleAlice\Database\Factories\AnimalFactory;

/**
 * 動物モデル
 * @property $id
 * @property $name
 */
class Animal extends Model
{
    use HasFactory;

    /**
     * @see HasFactory::newFactory()
     */
    protected static function newFactory()
    {
        return AnimalFactory::new();
    }
}
