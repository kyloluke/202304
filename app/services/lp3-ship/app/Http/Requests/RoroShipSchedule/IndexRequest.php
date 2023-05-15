<?php

namespace Services\Lp3Ship\App\Http\Requests\RoroShipSchedule;

use App\Http\Requests\Traits\ScribeQueryParametersHelper;
use App\Rules\ExistsCheckRule;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Http\Requests\Request;
use Services\Lp3Ship\App\Models\ShipCompany;
use Services\Lp3Ship\App\Rules\ShipExistsCheckRule;
use Services\Lp3Ship\Refers\Models\Port;

/**
 * RORO船スケジュールの一覧の取得リクエスト
 */
class IndexRequest extends Request
{
    use ScribeQueryParametersHelper;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pageSize' => ['nullable', 'numeric'],
            'page' => ['nullable', 'numeric'],
            'shipId' => ['nullable', 'numeric', new ShipExistsCheckRule([ShipType::RORO_SHIP->value, ShipType::CONRO_SHIP->value])],
            'shipCompanyId' => ['nullable', 'numeric', new ExistsCheckRule(ShipCompany::class, '船会社ID')],
            'polPortId' => ['nullable', 'numeric', new ExistsCheckRule(Port::class, '積港ID', ['type' => PortType::POL->value])],
            'podPortId' => ['nullable', 'numeric', new ExistsCheckRule(Port::class, '揚港ID', ['type' => PortType::POD->value])],
            'documentCutAt' => ['nullable', 'date'],
            'voyageNumber' => ['nullable', 'string', 'max:250']
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'pageSize' => [
                'description' => '表示件数',
                'example' => '50',
            ],
            'page' => [
                'description' => 'ページ数',
                'example' => '3',
            ],
            'shipId' => [
                'description' => '本船ID',
                'example' => '3',
            ],
            'shipCompanyId' => [
                'description' => '船会社ID',
                'example' => 5,
            ],
            'polPortId' => [
                'description' => '積港ID',
                'example' => 5,
            ],
            'podPortId' => [
                'description' => '揚港ID',
                'example' => 5,
            ],
            'documentCutAt' => [
                'description' => '本日以降のCUT日のみを表示',
                'example' => '20220215',
            ],
            'voyageNumber' => [
                'description' => '航海番号',
                'example' => 'No.dgsd334#&%2665555',
            ]
        ];
    }
}
