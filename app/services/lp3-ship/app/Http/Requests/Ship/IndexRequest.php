<?php

namespace Services\Lp3Ship\App\Http\Requests\Ship;

use Illuminate\Validation\Rule;
use Services\Lp3Ship\App\Enums\ShipType;

/**
 * 本船の一覧の取得リクエスト
 */
class IndexRequest extends ShipCommonRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string'],
            'type' => ['nullable', 'int', Rule::in(array_column(ShipType::cases(), 'value'))],
            'page' => ['nullable', 'int']
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
            'name' => [
                'description' => "本船名",
                'example' => "テスト本船",
            ],

            'type' => [
                'description' => "本船種別（1,2,3のいずれか）",
                'example' => 1,
            ],

            'page' => [
                'description' => 'ページ',
                'example' => '1',
            ]
        ];
    }
}
