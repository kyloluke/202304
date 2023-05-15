<?php

namespace Services\Lp3Core\App\Http\Requests\Yard;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Http\Requests\Request;
use Services\Lp3Core\App\Models\Yard;

/**
 * ヤードの更新リクエスト
 *
 * @urlParam id integer required The ID of the yard
 */
class UpdateRequest extends Request
{
    use ScribeBodyParametersHelper;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nameJp' => ['string', 'required', Rule::unique('yards', 'name_jp')->ignore($this->yard)],
            'nameEn' => ['string', 'required', Rule::unique('yards', 'name_en')->ignore($this->yard)],
            'yardGroupId' => ['required', 'integer', Rule::exists('yard_groups', 'id')],
            'countryId' => ['nullable', 'integer', Rule::exists('countries', 'id')],
            'zipcode' => ['nullable', 'string'],
            'stateJp' => ['nullable', 'string'],
            'stateEn' => ['nullable', 'string'],
            'cityJp' => ['nullable', 'string'],
            'cityEn' => ['nullable', 'string'],
            'address1Jp' => ['nullable', 'string'],
            'address2Jp' => ['nullable', 'string'],
            'address3Jp' => ['nullable', 'string'],
            'address1En' => ['nullable', 'string'],
            'address2En' => ['nullable', 'string'],
            'address3En' => ['nullable', 'string'],
            'timezone' => ['nullable', 'string'],
            'naccsBondedAreaCode' => ['nullable', 'string'],
            'mail' => ['nullable', 'string'],
            'telephone' => ['nullable', 'string'],
            'personInChargeJp' => ['nullable', 'string'],
            'personInChargeEn' => ['nullable', 'string'],
            'capacity' => ['nullable', 'integer'],
            'ccWhenCarryInCy' => ['nullable', 'boolean'],
            'nameWeb' => ['nullable', 'string'],
            'mapUrlWeb' => ['nullable', 'string'],
            'cargoTypeIds' => ['nullable', 'array'],
            'cargoTypeIds.*' => ['nullable', 'integer', Rule::exists('cargo_types', 'id')],
            'transportMethodWeb' => ['nullable', 'string'],
            'status' => ['nullable', 'integer', Rule::in(array_column(YardStatus::cases(), 'value'))],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::bodyParameters()
     *
     * @return array<string, mixed>
     */
    public function bodyParameters(): array
    {
        return [
            'nameJp' => [
                'description' => "名称_日本語",
                'example' => "テストヤード"
            ],
            'nameEn' => [
                'description' => "名称_英語",
                'example' => "TEST YARD"
            ],
            'yardGroupId' => [
                'description' => "国Id",
                'example' => 100
            ],
            'countryId' => [
                'description' => "所属先ヤードグループId",
                'example' => 2
            ],
            'zipcode' => [
                'description' => "郵便番号",
                'example' => "111-1111 or 1111111"
            ],
            'stateJp' => [
                'description' => "州_日本語",
                'example' => "テスト州"
            ],
            'stateEn' => [
                'description' => "州_英語",
                'example' => "test state"
            ],
            'cityJp' => [
                'description' => "市_日本語",
                'example' => "テスト市"
            ],
            'cityEn' => [
                'description' => "市_英語",
                'example' => "test city"
            ],
            'address1Jp' => [
                'description' => "住所1_日本語",
                'example' => "東京都千代田区"
            ],
            'address2Jp' => [
                'description' => "住所2_日本語",
                'example' => "1-1-1"
            ],
            'address3Jp' => [
                'description' => "住所3_日本語",
                'example' => "テストハイツ101"
            ],
            'address1En' => [
                'description' => "住所1_英語",
                'example' => "Washington D.C"
            ],
            'address2En' => [
                'description' => "住所2_英語",
                'example' => "1600 Pennsylvania Avenue NW"
            ],
            'address3En' => [
                'description' => "住所3_英語",
                'example' => "test building 1000"
            ],
            'timezone' => [
                'description' => "タイムゾーン",
                'example' => ""
            ],
            'naccsBondedAreaCode' => [
                'description' => "保税地域コード",
                'example' => "UTC"
            ],
            'mail' => [
                'description' => "メールアドレス",
                'example' => "test@test.com"
            ],
            'telephone' => [
                'description' => "電話番号",
                'example' => "000-000-0000 or 000(000)0000"
            ],
            'personInChargeJp' => [
                'description' => "担当者_日本語",
                'example' => "テスト太郎"
            ],
            'personInChargeEn' => [
                'description' => "担当者_英語",
                'example' => "Test James"
            ],
            'capacity' => [
                'description' => "キャパシティ",
                'example' => 100
            ],
            'ccWhenCarryInCy' => [
                'description' => "CY搬入時通関済みフラグ",
                'example' => false
            ],
            'nameWeb' => [
                'description' => "HP名称",
                'example' => "株式会社テスト"
            ],
            'mapUrlWeb' => [
                'description' => "地図URL",
                'example' => "https//:testtest.com"
            ],
            'cargoTypeIds.*' => [
                'description' => "取扱貨物種類のId",
                'example' => 1
            ],
            'transportMethodWeb' => [
                'description' => "輸送手段",
                'example' => "コンテナ"
            ],
            'status' => [
                'description' => "ヤードステータス",
                'example' => YardStatus::ENABLE->value
            ],
        ];
    }

    public function getTargetYard()
    {
        return Yard::with('cargoTypes')->findOrFail($this->yard);
    }

    public function makeArraysForUseCase(Yard $targetYard)
    {
        return [
            'nameJp' => $this->nameJp,
            'nameEn' => $this->nameEn,
            'yardGroupId' => $this->yardGroupId,
            'countryId' => isset($this->countryId) ? $this->countryId : $targetYard->country_id,
            'zipcode' => isset($this->zipcode) ? $this->zipcode : $targetYard->zipcode,
            'stateJp' => isset($this->stateJp) ? $this->stateJp : $targetYard->state_jp,
            'stateEn' => isset($this->stateEn) ? $this->stateEn : $targetYard->state_en,
            'cityJp' => isset($this->cityJp) ? $this->cityJp : $targetYard->city_jp,
            'cityEn' => isset($this->cityEn) ? $this->cityEn : $targetYard->city_en,
            'address1Jp' => isset($this->address1Jp) ? $this->address1Jp : $targetYard->address1_jp,
            'address2Jp' => isset($this->address2Jp) ? $this->address2Jp : $targetYard->address2_jp,
            'address3Jp' => isset($this->address3Jp) ? $this->address3Jp : $targetYard->address3_jp,
            'address1En' => isset($this->address1En) ? $this->address1En : $targetYard->address1_en,
            'address2En' => isset($this->address2En) ? $this->address2En : $targetYard->address2_en,
            'address3En' => isset($this->address3En) ? $this->address3En : $targetYard->address3_en,
            'timezone' => isset($this->timezone) ? $this->timezone : $targetYard->timezone,
            'naccsBondedAreaCode' => isset($this->naccsBondedAreaCode) ? $this->naccsBondedAreaCode : $targetYard->naccs_bonded_area_code,
            'mail' => isset($this->mail) ? $this->mail : $targetYard->mail,
            'telephone' => isset($this->telephone) ? $this->telephone : $targetYard->telephone,
            'personInChargeJp' => isset($this->personInChargeJp) ? $this->personInChargeJp : $targetYard->person_in_charge_jp,
            'personInChargeEn' => isset($this->personInChargeEn) ? $this->personInChargeEn : $targetYard->person_in_charge_en,
            'capacity' => isset($this->capacity) ? $this->capacity : $targetYard->capacity,
            'ccWhenCarryInCy' => isset($this->ccWhenCarryInCy) ? $this->ccWhenCarryInCy : $targetYard->cc_when_carry_in_cy,
            'nameWeb' => isset($this->nameWeb) ? $this->nameWeb : $targetYard->name_web,
            'mapUrlWeb' => isset($this->mapUrlWeb) ? $this->mapUrlWeb : $targetYard->map_url_web,
            'cargoTypeIds' => isset($this->cargoTypeIds) ? $this->cargoTypeIds : $this->getCargoTypeIds($targetYard),
            'transportMethodWeb' => isset($this->transportMethodWeb) ? $this->transportMethodWeb : $targetYard->transport_method_web,
            'status' => isset($this->status) ? $this->status : $targetYard->status,
        ];
    }

    private function getCargoTypeIds(Yard $targetYard)
    {
        return $targetYard->cargoTypes->map(function ($cargoType) {
            return $cargoType->id;
        });
    }
}
