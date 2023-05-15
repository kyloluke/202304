<?php

namespace Services\Lp3Core\App\Http\UseCases\Port;

use Services\Lp3Core\App\Models\Location;
use Services\Lp3Core\App\Models\Port;

class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id, array $data): Port
    {
        $port = Port::findOrFail($id);

        if (isset($data['name']))
            $port->name = $data['name'];

        if (isset($data['nameEn']))
            $port->name_en = $data['nameEn'];

        if (isset($data['type']))
            $port->type = $data['type'];

        if (isset($data['countryId']))
            $port->country_id = $data['countryId'];

        if (isset($data['zipCode']))
            $port->zip_code = $data['zipCode'];

        if (isset($data['stateJp']))
            $port->state_jp = $data['stateJp'];

        if (isset($data['stateEn']))
            $port->state_en = $data['stateEn'];

        if (isset($data['cityJp']))
            $port->city_jp = $data['cityJp'];

        if (isset($data['cityEn']))
            $port->city_en = $data['cityEn'];

        if (isset($data['address1Jp']))
            $port->address1_jp = $data['address1Jp'];

        if (isset($data['address1En']))
            $port->address1_en = $data['address1En'];

        if (isset($data['address2Jp']))
            $port->address2_jp = $data['address2Jp'];

        if (isset($data['address2En']))
            $port->address2_en = $data['address2En'];

        if (isset($data['address3Jp']))
            $port->address3_jp = $data['address3Jp'];

        if (isset($data['address3En']))
            $port->address3_en = $data['address3En'];

        if (isset($data['unloCode']))
            $port->unlo_code = $data['unloCode'];

        if (isset($data['requireLocalAgent']))
            $port->require_local_agent = $data['requireLocalAgent'];

        if (isset($data['naccsCode']))
            $port->naccs_code = $data['naccsCode'];

        if (isset($data['timezone']))
            $port->timezone = $data['timezone'];

        $port->save();

        return $port->load('country');
    }
}
