<?php

namespace Services\Lp3Ship\App\Http\UseCases\ShipCompany;

use Services\Lp3Ship\App\Models\ShipCompany;

class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke(string $id, array $reqData): ShipCompany
    {
        $shipCompany = ShipCompany::findOrFail($id);
        if (isset($reqData['name']))
            $shipCompany->name = $reqData['name'];

        if (isset($reqData['scacCode']))
            $shipCompany->scac_code = $reqData['scacCode'];

        if (isset($reqData['mail']))
            $shipCompany->mail = $reqData['mail'];

        if (isset($reqData['remarks']))
            $shipCompany->remarks = $reqData['remarks'];

        if (isset($reqData['countryId']))
            $shipCompany->country_id = $reqData['countryId'];

        if (isset($reqData['zipCode']))
            $shipCompany->zip_code = $reqData['zipCode'];

        if (isset($reqData['stateJp']))
            $shipCompany->state_jp = $reqData['stateJp'];

        if (isset($reqData['stateEn']))
            $shipCompany->state_en = $reqData['stateEn'];

        if (isset($reqData['cityJp']))
            $shipCompany->city_jp = $reqData['cityJp'];

        if (isset($reqData['cityEn']))
            $shipCompany->city_en = $reqData['cityEn'];

        if (isset($reqData['address1Jp']))
            $shipCompany->address1_jp = $reqData['address1Jp'];

        if (isset($reqData['address1En']))
            $shipCompany->address1_en = $reqData['address1En'];

        if (isset($reqData['address2Jp']))
            $shipCompany->address2_jp = $reqData['address2Jp'];

        if (isset($reqData['address2En']))
            $shipCompany->address2_en = $reqData['address2En'];

        if (isset($reqData['address3Jp']))
            $shipCompany->address3_jp = $reqData['address3Jp'];

        if (isset($reqData['address3En']))
            $shipCompany->address3_en = $reqData['address3En'];

        if (isset($reqData['timezone']))
            $shipCompany->timezone = $reqData['timezone'];

        if (count($reqData))
            $shipCompany->save();

        return $shipCompany;
    }
}
