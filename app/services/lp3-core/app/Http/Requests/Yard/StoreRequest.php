<?php

namespace Services\Lp3Core\App\Http\Requests\Yard;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * ヤードの作成リクエスト
 */
class StoreRequest extends Request
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
            'nameJp' => ['string', 'required', Rule::unique('yards', 'name_jp')],
            'nameEn' => ['string', 'required', Rule::unique('yards', 'name_en')],
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
                'description' => "所属先ヤードグループId",
                'example' => 2
            ],
            'countryId' => [
                'description' => "国Id",
                'example' => 100
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
                'example' => "UTC"
            ],
            'naccsBondedAreaCode' => [
                'description' => "保税地域コード",
                'example' => "xxxxx"
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
        ];
    }

    public function makeArraysForUseCase()
    {
        return [
            'nameJp' => $this->nameJp,
            'nameEn' => $this->nameEn,
            'yardGroupId' => $this->yardGroupId,
            'countryId' => isset($this->countryId) ? $this->countryId : null,
            'zipcode' => isset($this->zipcode) ? $this->zipcode : null,
            'stateJp' => isset($this->stateJp) ? $this->stateJp : null,
            'stateEn' => isset($this->stateEn) ? $this->stateEn : null,
            'cityJp' => isset($this->cityJp) ? $this->cityJp : null,
            'cityEn' => isset($this->cityEn) ? $this->cityEn : null,
            'address1Jp' => isset($this->address1Jp) ? $this->address1Jp : null,
            'address2Jp' => isset($this->address2Jp) ? $this->address2Jp : null,
            'address3Jp' => isset($this->address3Jp) ? $this->address3Jp : null,
            'address1En' => isset($this->address1En) ? $this->address1En : null,
            'address2En' => isset($this->address2En) ? $this->address2En : null,
            'address3En' => isset($this->address3En) ? $this->address3En : null,
            'timezone' => isset($this->timezone) ? $this->timezone : null,
            'naccsBondedAreaCode' => isset($this->naccsBondedAreaCode) ? $this->naccsBondedAreaCode : null,
            'mail' => isset($this->mail) ? $this->mail : null,
            'telephone' => isset($this->telephone) ? $this->telephone : null,
            'personInChargeJp' => isset($this->personInChargeJp) ? $this->personInChargeJp : null,
            'personInChargeEn' => isset($this->personInChargeEn) ? $this->personInChargeEn : null,
            'capacity' => isset($this->capacity) ? $this->capacity : null,
            'ccWhenCarryInCy' => isset($this->ccWhenCarryInCy) ? $this->ccWhenCarryInCy : false,
            'nameWeb' => isset($this->nameWeb) ? $this->nameWeb : null,
            'mapUrlWeb' => isset($this->mapUrlWeb) ? $this->mapUrlWeb : null,
            'cargoTypeIds' => isset($this->cargoTypeIds) ? $this->cargoTypeIds : [],
            'transportMethodWeb' => isset($this->transportMethodWeb) ? $this->transportMethodWeb : null,
        ];
    }
}
