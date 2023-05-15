<?php

namespace Services\Lp3Core\App\Http\Resources\YardGroup;

use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Http\Resources\Resource as BaseResource;

/**
 * ヤードグループ用のヤードリソース
 */
class YardResourceForYardGroup extends BaseResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "yardGroupId" => $this->yardGroup->id,
            "nameJp" => $this->name_jp,
            "nameEn" => $this->name_en,
            "zipcode" => $this->zipcode,
            "stateJp" => $this->state_jp,
            "stateEn" => $this->state_en,
            "cityJp" => $this->city_jp,
            "cityEn" => $this->city_en,
            "address1Jp" => $this->address1_jp,
            "address2Jp" => $this->address2_jp,
            "address3Jp" => $this->address3_jp,
            "address1En" => $this->address1_en,
            "address2En" => $this->address2_en,
            "address3En" => $this->address3_en,
            "naccsBondedAreaCode" => $this->naccs_bonded_area_code,
            "mail" => $this->mail,
            "telephone" => $this->telephone,
            "personInChargeJp" => $this->person_in_charge_jp,
            "personInChargeEn" => $this->person_in_charge_en,
            "capacity" => $this->capacity,
            "ccWhenCarryInCy" => $this->cc_when_carry_in_cy,
            "nameWeb" => $this->name_web,
            "mapUrlWeb" => $this->map_url_web,
            "cargoTypes" => $this->cargoTypes->map(function ($cargoType) {
                return [
                    'id' => $cargoType->id,
                    'name' => $cargoType->name,
                ];
            }),
            "transportMethodWeb" => $this->transport_method_web,
            "status" => YardStatus::tryFrom($this->status)->value,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
            // "updatedBy" => $this->updater->name,  // @todo User周りの改修が完了したらコメントアウトを外す。
        ];
    }
}
