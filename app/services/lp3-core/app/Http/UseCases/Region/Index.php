<?php

namespace Services\Lp3Core\App\Http\UseCases\Region;

use Illuminate\Database\Eloquent\Collection;
use Services\Lp3Core\App\Models\Region;

class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(): Collection
    {
        return Region::all();
    }
}
