<?php

namespace Services\Lp3Core\App\Http\Requests\Port;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use App\Rules\ExistsCheckRule;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Core\App\Enums\TimeZone;
use Services\Lp3Core\App\Http\Requests\Request;
use Services\Lp3Core\App\Models\Country;
use Services\Lp3Core\App\Models\Port;
use App\Rules\UniqueCheckRule;

/**
 * 港の更新リクエスト
 */
class UpdateRequest extends Request
{
    use ScribeBodyParametersHelper;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50', new UniqueCheckRule(Port::class, '港名称', $this->port)],// 重複チェックは同じのタイプ限りです
            'nameEn' => ['nullable', 'string', 'max:50'],
            'countryId' => ['nullable', 'numeric', new ExistsCheckRule(Country::class, '国ID')],
            'zipCode' => ['nullable', 'string', 'max:50'],
            'stateJp' => ['nullable', 'string', 'max:50'],
            'stateEn' => ['nullable', 'string', 'max:50'],
            'cityJp' => ['nullable', 'string', 'max:50'],
            'cityEn' => ['nullable', 'string', 'max:50'],
            'address1Jp' => ['nullable', 'string', 'max:120'],
            'address1En' => ['nullable', 'string', 'max:120'],
            'address2Jp' => ['nullable', 'string', 'max:120'],
            'address2En' => ['nullable', 'string', 'max:120'],
            'address3Jp' => ['nullable', 'string', 'max:120'],
            'address3En' => ['nullable', 'string', 'max:120'],
            'unloCode' => ['nullable', 'string', 'max:50'],
            'naccsCode' => ['nullable', 'string', 'max:50'],
            'requireLocalAgent' => ['nullable', 'boolean'],
            'timezone' => ['nullable', Rule::in(array_column(Timezone::cases(), 'value'))],
            'type' => ['required', 'numeric', Rule::in(array_column(PortType::cases(), 'value'))]
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'name' => ['description' => '港名称', 'example' => 'xxxx物流センター'],
            'nameEn' => ['description' => '港英語名称', 'example' => 'xxxx location name'],
            'countryId' => ['description' => '国ID', 'example' => '3'],
            'zipCode' => ['description' => '郵便番号', 'example' => '123 4567'],
            'stateJp' => ['description' => '州_日本語', 'example' => '埼玉県'],
            'stateEn' => ['description' => '州_英語', 'example' => 'saitamaken'],
            'cityJp' => ['description' => '市_日本語', 'example' => '川口'],
            'cityEp' => ['description' => '市_英語', 'example' => 'kawaguchi'],
            'address1Jp' => ['description' => '日本語アドレス１', 'example' => '東京都中央区勝どき6-5-23 山九ビル4階'],
            'address1En' => ['description' => '英語アドレス１', 'example' => '3-21 NISHIKI-MACHI KANDA CHIYODA-KU TOKYO JA'],
            'address2Jp' => ['description' => '日本語アドレス２', 'example' => '東京都中央区勝どき6-5-23 山九ビル4階'],
            'address2En' => ['description' => '英語アドレス２', 'example' => '3-21 NISHIKI-MACHI KANDA CHIYODA-KU TOKYO JA'],
            'address3Jp' => ['description' => '日本語アドレス３', 'example' => '東京都中央区勝どき6-5-23 山九ビル4階'],
            'address3En' => ['description' => '英語アドレス３', 'example' => '3-21 NISHIKI-MACHI KANDA CHIYODA-KU TOKYO JA'],
            'unloCode' => ['description' => 'UN/LOコード', 'example' => 'unloCodexxxx'],
            'naccsCode' => ['description' => 'NACCSコード', 'example' => 'NACCSコードxxx'],
            'requireLocalAgent' => ['description' => '現地代理店必須フラグ', 'example' => 'true 或　1'],
            'timezone' => ['description' => 'タイムゾーン', 'example' => implode('、', array_column(TimeZone::cases(), 'value'))],
            'type' => ['description' => '港種別', 'example' => implode('、', array_column(PortType::cases(), 'value'))]
        ];
    }
}
