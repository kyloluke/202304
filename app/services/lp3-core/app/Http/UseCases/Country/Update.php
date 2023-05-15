<?php

namespace Services\Lp3Core\App\Http\UseCases\Country;

use Services\Lp3Core\App\Models\Country;

class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id, array $data): Country
    {
        $country = Country::findOrFail($id);
        if (isset($data['name']))
            $country->name = $data['name'];
        if (isset($data['regionId']))
            $country->region_id = $data['regionId'];
        $country->save();

        if (isset($data['requiredInspections']) && count($data['requiredInspections'])) {
            $country->requiredInspections()->sync($data['requiredInspections']);
        }
        return $country->load('requiredInspections', 'region');
    }
}
