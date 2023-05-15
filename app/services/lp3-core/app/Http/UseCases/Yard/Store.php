<?php

namespace Services\Lp3Core\App\Http\UseCases\Yard;

use Illuminate\Support\Facades\DB;
use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Models\Yard;

/**
 * ヤードの作成
 */
class Store
{
    /**
     * 関数呼び出し
     * 
     * @param array<string mixed> $requestData
     */
    public function __invoke($requestData): Yard
    {
        return DB::transaction(function () use ($requestData) {
            $yard = new Yard();

            $yard->name_jp = $requestData["nameJp"];
            $yard->name_en = $requestData["nameEn"];
            $yard->yard_group_id = $requestData["yardGroupId"];
            $yard->status = YardStatus::ENABLE->value;
            $yard->country_id = $requestData["countryId"];
            $yard->zipcode = $requestData["zipcode"];
            $yard->state_jp = $requestData["stateJp"];
            $yard->state_en = $requestData["stateEn"];
            $yard->city_jp = $requestData["cityJp"];
            $yard->city_en = $requestData["cityEn"];
            $yard->address1_jp = $requestData["address1Jp"];
            $yard->address2_jp = $requestData["address2Jp"];
            $yard->address3_jp = $requestData["address3Jp"];
            $yard->address1_en = $requestData["address1En"];
            $yard->address2_en = $requestData["address2En"];
            $yard->address3_en = $requestData["address3En"];
            $yard->timezone = $requestData["timezone"];
            $yard->naccs_bonded_area_code = $requestData["naccsBondedAreaCode"];
            $yard->mail = $requestData["mail"];
            $yard->telephone = $requestData["telephone"];
            $yard->person_in_charge_jp = $requestData["personInChargeJp"];
            $yard->person_in_charge_en = $requestData["personInChargeEn"];
            $yard->capacity = $requestData["capacity"];
            $yard->cc_when_carry_in_cy = $requestData["ccWhenCarryInCy"];
            $yard->name_web = $requestData["nameWeb"];
            $yard->map_url_web = $requestData["mapUrlWeb"];
            $yard->transport_method_web = $requestData["transportMethodWeb"];

            $yard->save();

            // yards_cargo_typesテーブルへの保存
            $yard->cargoTypes()->syncWithoutDetaching($requestData["cargoTypeIds"]);

            $yard->refresh();
            return $yard;
        });
    }
}
