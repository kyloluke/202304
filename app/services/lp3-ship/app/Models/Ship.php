<?php

namespace Services\Lp3Ship\App\Models;

use App\Models\Traits\AuthorObservable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Services\Lp3Ship\Database\Factories\Models\ShipFactory;

/**
 * 本船モデル
 * @property $id
 * @property $name
 * @property $type
 */
class Ship extends \App\Models\Model
{
    use AuthorObservable, SoftDeletes, HasFactory;

    protected $fillable = [
        'id',
        'name',
        'type',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function newFactory()
    {
        return ShipFactory::new();
    }
}
