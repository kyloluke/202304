<?php

namespace Services\Lp3Core\App\Http\UseCases\Yard;

use Illuminate\Support\Facades\DB;
use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Http\UseCases\Yard\Exceptions\YardSaveException;
use Services\Lp3Core\App\Models\Yard;

/**
 * ヤードの更新
 */
class Update
{
    /**
     * 関数呼び出し
     * 
     * @param Yard $targetYard
     * @param array<string mixed> $requestData
     */
    public function __invoke(Yard $targetYard, $requestData): Yard
    {
        return DB::transaction(function () use ($targetYard, $requestData) {
            // 所属先ヤードグループが変更不可能になる条件
            // ・ヤードグループの代表ヤードであり、自身以外にアクティブなヤードが所属している
            if (
                $targetYard->yard_group_id != $requestData["yardGroupId"] &&
                $targetYard->id == $targetYard->yardGroup->representative_yard_id &&
                $targetYard->yardGroup->yards()->where('status', '=', YardStatus::ENABLE->value)->count() > 1
            ) {
                throw new YardSaveException(YardSaveException::CHANGE_BELONGING_TO_ERROR);
            }
            $targetYard->yard_group_id = $requestData["yardGroupId"];


            // ヤードステータスを非アクティブへできなくなる条件
            // ・ヤードグループの代表ヤードであり、自身以外にアクティブなヤードが所属している
            if (
                $targetYard->status = YardStatus::ENABLE->value &&
                $requestData["status"] == YardStatus::DISABLE->value &&
                $targetYard->id == $targetYard->yardGroup->representative_yard_id &&
                $targetYard->yardGroup->yards()->where('status', YardStatus::ENABLE->value)->count() > 1
            ) {
                throw new YardSaveException(YardSaveException::INACTIVE_REPRESENTATIVE_YARD_ERROR);
            }
            $targetYard->status = $requestData["status"];

            // yardsテーブルへの更新
            $targetYard->name_jp = $requestData["nameJp"];
            $targetYard->name_en = $requestData["nameEn"];
            $targetYard->country_id = $requestData["countryId"];
            $targetYard->zipcode = $requestData["zipcode"];
            $targetYard->state_jp = $requestData["stateJp"];
            $targetYard->state_en = $requestData["stateEn"];
            $targetYard->city_jp = $requestData["cityJp"];
            $targetYard->city_en = $requestData["cityEn"];
            $targetYard->address1_jp = $requestData["address1Jp"];
            $targetYard->address2_jp = $requestData["address2Jp"];
            $targetYard->address3_jp = $requestData["address3Jp"];
            $targetYard->address1_en = $requestData["address1En"];
            $targetYard->address2_en = $requestData["address2En"];
            $targetYard->address3_en = $requestData["address3En"];
            $targetYard->timezone = $requestData["timezone"];
            $targetYard->naccs_bonded_area_code = $requestData["naccsBondedAreaCode"];
            $targetYard->mail = $requestData["mail"];
            $targetYard->telephone = $requestData["telephone"];
            $targetYard->person_in_charge_jp = $requestData["personInChargeJp"];
            $targetYard->person_in_charge_en = $requestData["personInChargeEn"];
            $targetYard->capacity = $requestData["capacity"];
            $targetYard->cc_when_carry_in_cy = $requestData["ccWhenCarryInCy"];
            $targetYard->name_web = $requestData["nameWeb"];
            $targetYard->map_url_web = $requestData["mapUrlWeb"];
            $targetYard->transport_method_web = $requestData["transportMethodWeb"];

            $targetYard->save();

            // yards_cargo_typesテーブルへの保存
            $targetYard->cargoTypes()->sync($requestData["cargoTypeIds"]);

            $targetYard->refresh();
            return $targetYard;
        });
    }
}
