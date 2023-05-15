<?php

namespace Services\Lp3Core\App\Http\Requests\YardGroup;

use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * ヤードグループの一覧の取得リクエスト
 */
class IndexRequest extends Request
{
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
    public function rules()
    {
        return [
            'nameKeyWords' => ['array', 'nullable'],
            'nameKeyWords.*' => ['string', 'nullable'],
            'yardStatus' => ['integer', 'nullable', Rule::in(array_column(YardStatus::cases(), 'value'))],
            'capacities' => ['array', 'nullable'],
            'capacities.*' => ['integer', 'nullable'],
            'mailKeyWords' => ['array', 'nullable'],
            'mailKeyWords.*' => ['string', 'nullable'],
            'defaultPolId' => ['integer', 'nullable'],
            // 検索項目が「デフォルト通関業者」であるため、通関業者と紐づいている事業所のIdのみに制限している。
            'defaultCustomBrokerOfficeId' => ['integer', 'nullable', Rule::exists('office_business_types', 'office_id')->where(function ($query) {
                $query->where('business_type', BusinessType::CUSTOM_BROKER->value);
            })],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     * 
     * @return array<string, mixed>
     */
    public function queryParameters(): array
    {
        return [
            'nameKeyWords.*' => [
                'description' => "ヤード名/ヤードグループ名キーワード",
                'example' => 'テスト'
            ],

            'yardStatus' => [
                'description' => "ヤードステータス",
                'example' => 1,
            ],

            'capacities.*' => [
                'description' => "収容可能台数",
                'example' => 100
            ],

            'mailKeyWords.*' => [
                'description' => "メールアドレスキーワード",
                'example' => 'test'
            ],

            'defaultPolId' => [
                'description' => "デフォルト積港Id",
                'example' => 100,
            ],

            'defaultCustomBrokerOfficeId' => [
                'description' => "デフォルト通関業者Id",
                'example' => 100,
            ]
        ];
    }
}
