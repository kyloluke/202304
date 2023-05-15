<?php

namespace Services\Lp3Core\App\Http\Requests\Organization;

use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\SystemUsage;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 組織の一覧取得リクエスト
 */
class IndexRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'nameKeyWords' => ['array', 'nullable'],
            'nameKeyWords.*' => ['string', 'nullable'],
            'systemUsage' => ['integer', 'nullable', Rule::in(array_column(SystemUsage::cases(), 'value'))],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'nameKeyWords.*' => [
                'description' => "名称/正式名称/省略名称キーワード",
                'example' => 'テスト'
            ],

            'yardStatus' => [
                'description' => "システム利用形態",
                'example' => SystemUsage::ADMINISTRATION->value,
            ],
        ];
    }
}
