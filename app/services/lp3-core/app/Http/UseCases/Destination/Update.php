<?php

namespace Services\Lp3Core\App\Http\UseCases\Destination;

use Services\Lp3Core\App\Models\Destination;

class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id, array $data): Destination
    {
        $destination = Destination::findOrFail($id);

        if (isset($data['name']))
            $destination->name = $data['name'];

        if (isset($data['nameEn']))
            $destination->name_en = $data['nameEn'];

        if (isset($data['countryId']))
            $destination->country_id = $data['countryId'];

        if (isset($data['zipCode']))
            $destination->zip_code = $data['zipCode'];

        if (isset($data['stateJp']))
            $destination->state_jp = $data['stateJp'];

        if (isset($data['stateEn']))
            $destination->state_en = $data['stateEn'];

        if (isset($data['cityJp']))
            $destination->city_jp = $data['cityJp'];

        if (isset($data['cityEn']))
            $destination->city_en = $data['cityEn'];

        if (isset($data['address1Jp']))
            $destination->address1_jp = $data['address1Jp'];

        if (isset($data['address1En']))
            $destination->address1_en = $data['address1En'];

        if (isset($data['address2Jp']))
            $destination->address2_jp = $data['address2Jp'];

        if (isset($data['address2En']))
            $destination->address2_en = $data['address2En'];

        if (isset($data['address3Jp']))
            $destination->address3_jp = $data['address3Jp'];

        if (isset($data['address3En']))
            $destination->address3_en = $data['address3En'];

        if (isset($data['unloCode']))
            $destination->unlo_code = $data['unloCode'];

        if (isset($data['requireLocalAgent']))
            $destination->require_local_agent = $data['requireLocalAgent'];

        if (isset($data['naccsCode']))
            $destination->naccs_code = $data['naccsCode'];

        if (isset($data['timezone']))
            $destination->timezone = $data['timezone'];

        $destination->save();

        return $destination->load('country');
    }
}
