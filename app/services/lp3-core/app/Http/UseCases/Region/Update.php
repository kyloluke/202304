<?php

namespace Services\Lp3Core\App\Http\UseCases\Region;

use Services\Lp3Core\App\Models\Region;

class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id, array $data): Region
    {
        $region = Region::findOrFail($id);
        if (isset($data['name']))
            $region->name = $data['name'];
        if (count($data))
            $region->save();
        return $region;
    }
}
