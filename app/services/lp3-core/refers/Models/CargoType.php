<?php

namespace Services\Lp3Core\Refers\Models;

use Services\Lp3Core\App\Models\Yard;

/**
 * 貨物種類モデル
 */
class CargoType extends \Services\Lp3Cargo\App\Models\CargoType
{
    public function yards()
    {
        return $this->belongsToMany(Yard::class, 'yard_cargo_type', 'cargo_type_id', 'yard_id')->withTimestamps();
    }
}
