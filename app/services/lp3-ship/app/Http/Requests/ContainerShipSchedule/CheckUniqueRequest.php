<?php

namespace Services\Lp3Ship\App\Http\Requests\ContainerShipSchedule;

use App\Rules\ExistsCheckRule;
use Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Http\Requests\Request;
use Services\Lp3Ship\App\Rules\ShipExistsCheckRule;
use Services\Lp3Ship\App\Models\ShipCompany;

/**
 * コンテナ船スケジュールのユニックチェック　リクエスト
 */
class CheckUniqueRequest extends Request
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
            'shipId' => ['required', 'numeric', new ShipExistsCheckRule([ShipType::CONTAINER_SHIP->value, ShipType::CONRO_SHIP->value])],
            'shipCompanyId' => ['required', 'numeric', new ExistsCheckRule(ShipCompany::class, '船会社')],
            'voyageNumber' => ['required', 'string', 'max:200'],
            'polDepartureAt' => ['required', 'date'],
            'podArrivalAt' => ['required', 'date', 'after:polDepartureAt'],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'shipId' => [
                'description' => '本船ID',
                'example' => 33
            ],

            'shipCompanyId' => [
                'description' => '船会社ID',
                'example' => 12
            ],
            'voyageNumber' => [
                'description' => '航海番号',
                'example' => 'No.xxx33346366664'
            ],
            'polDepartureAt' => [
                'description' => '積地の出発予定日',
                'example' => '20230202 02:02'
            ],
            'podArrivalAt' => [
                'description' => '揚地の到着予定日',
                'example' => '20230202 02:02'
            ]
        ];
    }
}
