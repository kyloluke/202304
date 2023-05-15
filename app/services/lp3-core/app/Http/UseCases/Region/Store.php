<?php

namespace Services\Lp3Core\App\Http\UseCases\Region;

use Services\Lp3Core\App\Models\Region;

class Store
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data): Region
    {
        $region = new Region();
        if (isset($data['name']))
            $region->name = $data['name'];
        $region->save();
        return $region;
    }
}
