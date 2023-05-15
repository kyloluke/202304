<?php

namespace Services\Lp3Core\App\Http\UseCases\InspectionType;

use Illuminate\Database\Eloquent\Collection;
use Services\Lp3Core\App\Models\InspectionType;

class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(): Collection
    {
        return InspectionType::all();
    }
}
