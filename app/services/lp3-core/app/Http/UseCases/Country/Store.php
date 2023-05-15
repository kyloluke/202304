<?php

namespace Services\Lp3Core\App\Http\UseCases\Country;

use Services\Lp3Core\App\Models\Country;

class Store
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data): Country
    {
        $country = new Country();
        if (isset($data['name']))
            $country->name = $data['name'];
        if (isset($data['regionId']))
            $country->region_id = $data['regionId'];
        $country->save();
        if (isset($data['requiredInspections']) && count($data['requiredInspections'])) {
            $country->requiredInspections()->attach($data['requiredInspections']);
        }
        return $country->load('requiredInspections', 'region');
    }
}
