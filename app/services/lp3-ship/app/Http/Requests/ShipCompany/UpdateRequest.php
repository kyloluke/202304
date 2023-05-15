<?php

namespace Services\Lp3Ship\App\Http\Requests\ShipCompany;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use App\Rules\ExistsCheckRule;
use App\Rules\UniqueCheckRule;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\TimeZone;
use Services\Lp3Ship\App\Http\Requests\Request;
use Services\Lp3Ship\Refers\Models\Country;
use Services\Lp3Ship\App\Models\ShipCompany;

/**
 * 船会社の更新リクエスト
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
            'name' => ['required', 'max:50', new UniqueCheckRule(ShipCompany::class,'船会社名', $this->ship_company)],
            'scacCode' => ['max:50'],
            'mail' => ['email:rfc', 'max:500'],
            'remarks' => ['max:10000'],
            'countryId' => ['numeric', new ExistsCheckRule(Country::class, '国ID')],
            'zipCode' => ['max:50'],
            'stateJp' => ['max:50'],
            'stateEn' => ['max:50'],
            'cityJp' => ['max:50'],
            'cityEn' => ['max:50'],
            'address1Jp' => ['max:120'],
            'address1En' => ['max:120'],
            'address2Jp' => ['max:120'],
            'address2En' => ['max:120'],
            'address3Jp' => ['max:120'],
            'address3En' => ['max:120'],
            'timezone' => ['max:50', Rule::in(array_column(Timezone::cases(), 'value'))],
        ];

    }

    /**
     * @see ScribeBodyParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => '名称',
                'example' => 'ASIA MARINE AGENCY, LTD.',
            ],

            'scacCode' => [
                'description' => 'SCACコード',
                'example' => '11AT',
            ],
            'mail' => [
                'description' => 'メールアドレス',
                'example' => 'example@google.com',
            ],

            'remarks' => [
                'description' => '備考',
                'example' => '船会社の備考コンテンツxxxxxxx',
            ],

            'countryId' => [
                'description' => '国',
                'example' => '2',
            ],

            'zipCode' => [
                'description' => 'zipCode郵便番号',
                'example' => '11AT',
            ],

            'stateJp' => [
                'description' => '州「日本語」',
                'example' => '愛知県',
            ],

            'stateEn' => [
                'description' => '州「英語」',
                'example' => 'aichiken',
            ],

            'cityJp' => [
                'description' => 'シティ「日本語」',
                'example' => '名古屋',
            ],
            'cityEn' => [
                'description' => 'シティ「英語」',
                'example' => 'nagoya',
            ],
            'address1Jp' => ['description' => '日本語アドレス１', 'example' => '東京都中央区勝どき6-5-23 山九ビル4階'],
            'address1En' => ['description' => '英語アドレス１', 'example' => '3-21 NISHIKI-MACHI KANDA CHIYODA-KU TOKYO JA'],
            'address2Jp' => ['description' => '日本語アドレス２', 'example' => '東京都中央区勝どき6-5-23 山九ビル4階'],
            'address2En' => ['description' => '英語アドレス２', 'example' => '3-21 NISHIKI-MACHI KANDA CHIYODA-KU TOKYO JA'],
            'address3Jp' => ['description' => '日本語アドレス３', 'example' => '東京都中央区勝どき6-5-23 山九ビル4階'],
            'address3En' => ['description' => '英語アドレス３', 'example' => '3-21 NISHIKI-MACHI KANDA CHIYODA-KU TOKYO JA'],
            'timezone' => ['description' => 'タイムゾーン', 'example' => implode('、', (array_column(TimeZone::cases(), 'value')))],
        ];
    }
}
