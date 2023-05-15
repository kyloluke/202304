<?php

namespace Services\Lp3Core\App\Http\Requests\Yard;

use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\YardStatus;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * ヤードの一覧の取得リクエスト
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
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'nameKeyWords.*' => [
                'description' => "ヤード名/ヤードグループ名キーワード",
                'example' => "テスト",
            ],

            'yardStatus' => [
                'description' => "ヤードステータス",
                'example' => 1,
            ],

            'capacities.*' => [
                'description' => "収容可能台数",
                'example' => 100,
            ],
        ];
    }
}
