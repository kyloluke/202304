<?php

namespace Services\Lp3Core\App\Http\UseCases\Country;

use Illuminate\Database\Eloquent\Collection;
use Services\Lp3Core\App\Models\Country;

class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(): Collection
    {
        return Country::with('requiredInspections', 'region')->get();
    }
}
