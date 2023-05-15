<?php

namespace Services\Lp3Ship\App\Http\Requests\RoroShipSchedule;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use App\Rules\ExistsCheckRule;
use Services\Lp3Core\App\Enums\PortType;
use Services\Lp3Ship\App\Enums\ShipType;
use Services\Lp3Ship\App\Http\Requests\Request;
use Services\Lp3Ship\App\Models\Ship;
use Services\Lp3Ship\App\Models\ShipCompany;
use Services\Lp3Ship\App\Rules\ShipExistsCheckRule;
use Services\Lp3Ship\Refers\Models\Destination;
use Services\Lp3Ship\Refers\Models\Port;

/**
 * RORO船スケジュールの更新リクエスト
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
            'shipId' => [
                'required',
                'numeric',
                new ShipExistsCheckRule([ShipType::RORO_SHIP->value, ShipType::CONRO_SHIP->value])
            ],
            'shipCompanyId' => [
                'required',
                'numeric',
                new ExistsCheckRule(ShipCompany::class, '船会社ID')
            ],
            'voyageNumber' => ['nullable', 'string', 'max:250'],
            'remarks' => ['nullable', 'string', 'max:10000'],
            'referUrl' => ['nullable', 'url', 'max:250'],
            'scheduleItems' => ['required', 'array'],
            'scheduleItems.*.polPortId' => [
                'required',
                'numeric',
                new ExistsCheckRule(Port::class, '積港ID', ['type' => PortType::POL->value])
            ],
            'scheduleItems.*.polArrivalAt' => ['nullable', 'date'],
            'scheduleItems.*.polArrivedAt' => ['nullable', 'date'],
            'scheduleItems.*.polDepartureAt' => ['nullable', 'date'],
            'scheduleItems.*.polDepartedAt' => ['nullable', 'date'],
            'scheduleItems.*.podPortId' => [
                'required',
                'numeric',
                new ExistsCheckRule(Port::class, '揚港ID', ['type' => PortType::POD->value])
            ],
            'scheduleItems.*.podArrivalAt' => ['nullable', 'date'],
            'scheduleItems.*.podArrivedAt' => ['nullable', 'date'], 'nullable',
            'scheduleItems.*.documentCutAt' => ['nullable', 'date'],
            'scheduleItems.*.documentAmCut' => ['nullable', 'boolean'],
            'scheduleItems.*.remarks' => ['nullable', 'string', 'max:10000',],
            'scheduleItems.*.irregularCyCut' => ['nullable', 'boolean'],
            'scheduleItems.*.available' => ['nullable', 'boolean'],
            'scheduleItems.*.fdId' => ['nullable', 'numeric', new ExistsCheckRule(Destination::class, '仕向地ID')],
            'scheduleItems.*.fdArrivalAt' => ['nullable', 'date'],
            'scheduleItems.*.fdArrivedAt' => ['nullable', 'date'],
            'scheduleItems.*.goDownAt' => ['nullable', 'date'],
            'scheduleItems.*.goDownZipCode' => ['nullable', 'string', 'max:50'],
            'scheduleItems.*.goDownAddress' => ['nullable', 'string', 'max:250']
        ];
    }

    /**
     * @see ScribeBodyParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'shipId' => [
                'description' => '本船ID、外部キー',
                'example' => 12,
            ],

            'shipCompanyId' => [
                'description' => '船会社ID、外部キー',
                'example' => 27,
            ],
            'voyageNumber' => [
                'description' => '航海番号',
                'example' => 'JHD32433324XXX',
            ],

            'remarks' => [
                'description' => '備考',
                'example' => 'コンテナ船スケジュールの備考コンテンツxxxxxxx',
            ],

            'scheduleItems' => [
                'description' => 'スケジュール項目の配列',
                'example' => '[]',
            ],

            'scheduleItems.*.polPortId' => [
                'description' => '積港ID、外部キー',
                'example' => 6,
            ],

            'scheduleItems.*.polArrivalAt' => [
                'description' => '積港入港予定日時',
                'example' => '2023-07-12 15:00',
            ],

            'scheduleItems.*.polArrivedAt' => [
                'description' => '積港入港日時',
                'example' => '2023-07-12 15:00',
            ],

            'scheduleItems.*.polDepartureAt' => [
                'description' => '積港出港予定日時',
                'example' => '2023-07-12 15:00',
            ],
            'scheduleItems.*.podPortId' => [
                'description' => '揚港ID、外部キー',
                'example' => 34,
            ],
            'scheduleItems.*.podArrivalAt' => [
                'description' => '揚港到着予定日時',
                'example' => '2023-07-12 15:00',
            ],
            'scheduleItems.*.podArrivedAt' => [
                'description' => '揚港到着日時',
                'example' => '2023-07-12 15:00',
            ],
            'scheduleItems.*.documentCutAt' => [
                'description' => 'ドキュメントカット日時',
                'example' => '2023-07-12 15:00',
            ],
            'scheduleItems.*.documentAmCut' => [
                'description' => 'ドキュメントカットAMカットフラグ',
                'example' => false,
            ],
            'scheduleItems.*.remarks' => [
                'description' => '備考',
                'example' => 'ここは備考コンテンツ',
            ],
            'scheduleItems.*.irregularCyCut' => [
                'description' => '例外コンテナヤードカット日時フラグ',
                'example' => false,
            ],
            'scheduleItems.*.available' => [
                'description' => '利用可能フラグ',
                'example' => false,
            ],
            'scheduleItems.*.fdId' => [
                'description' => '仕向地、外部キー',
                'example' => 4,
            ],
            'scheduleItems.*.fdArrivalAt' => [
                'description' => '仕向地到着予定日時',
                'example' => '2023-07-12 15:00',
            ],
            'scheduleItems.*.fdArrivedAt' => [
                'description' => '仕向地到着日時',
                'example' => '2023-07-12 15:00',
            ],
            'scheduleItems.*.goDownAt' => [
                'description' => 'ゴーダウン予定日時',
                'example' => '2023-07-12 15:00',
            ],
            'scheduleItems.*.goDownZipCode' => [
                'description' => 'ゴーダウン場所の郵便番号',
                'example' => '122-2222 ',
            ],
            'scheduleItems.*.goDownAddress' => [
                'description' => 'ゴーダウン場所の住所',
                'example' => 'xxx県xxx市xxx町xxx村',
            ]
        ];
    }
}
