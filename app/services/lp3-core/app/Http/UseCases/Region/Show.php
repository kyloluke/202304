<?php

namespace Services\Lp3Core\App\Http\UseCases\Region;

use Services\Lp3Core\App\Models\Region;

class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Region
    {
        $region = Region::findOrFail($id);
        return $region;
    }
}
