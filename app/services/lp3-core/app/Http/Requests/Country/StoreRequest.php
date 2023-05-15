<?php

namespace Services\Lp3Core\App\Http\Requests\Country;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use App\Rules\ExistsCheckRule;
use Services\Lp3Core\App\Http\Requests\Request;
use Services\Lp3Core\App\Models\Country;
use App\Rules\UniqueCheckRule;
use Services\Lp3Core\App\Models\InspectionType;
use Services\Lp3Core\App\Models\Region;

/**
 * 国の新規作成リクエスト
 */
class StoreRequest extends Request
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
            'name' => [
                'required',
                'string',
                'max:50',
                new UniqueCheckRule(Country::class, '国名')
            ],
            'regionId' => ['required', 'numeric', new ExistsCheckRule(Region::class, '地域ID')],
            'requiredInspections' => ['array'],
            'requiredInspections.*' => ['numeric', new ExistsCheckRule(InspectionType::class, '検査種別ID')]
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => '国名称',
                'example' => 'アメリカ',
            ],
            'regionId' => [
                'description' => '地域ID',
                'example' => '地域テーブルの ID',
            ],
            'requiredInspections' => [
                'description' => '検索種別',
                'example' => '検索種別テーブル ID',
            ]
        ];
    }
}
