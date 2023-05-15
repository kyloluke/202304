<?php

namespace Services\Lp3Cargo\App\Http\Requests\Chassis;

use Services\Lp3Cargo\App\Http\Requests\Request;
use Services\Lp3Cargo\App\Enums\ChassisCarryType;
use Services\Lp3Cargo\App\Models\CarModel;
use Services\Lp3Cargo\Refers\Models\Office;
use Services\Lp3Cargo\Refers\Models\Yard;
use Services\Lp3Job\App\Enums\JobType;
use Illuminate\Validation\Rules\Enum;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use App\Rules\ExistsCheckRule;

/**
 * 車輌の登録リクエスト
 */
class StoreRequest extends Request
{
    use ScribeBodyParametersHelper;

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
            'carModelId' => ['required', 'numeric', new ExistsCheckRule(CarModel::class, '車名')],
            'yardId' => ['required', 'numeric', new ExistsCheckRule(Yard::class, 'ヤード')],
            'type' => ['required', 'numeric', new Enum(ChassisCarryType::class)],
            'moveInScheduleDate' => ['required', 'date'],
            'number' => ['nullable', 'string', 'max:250'],
            'displacement' => ['nullable', 'decimal:0,2'],
            'weight' => ['nullable', 'decimal:0,2'],
            'extent' => ['nullable', 'decimal:0,2'],
            'width' => ['nullable', 'decimal:0,2'],
            'height' => ['nullable', 'decimal:0,2'],
            'm3' => ['nullable', 'decimal:0,3'],
            'movable' => ['nullable', 'boolean'],
            'shipperId' => ['required', 'numeric', new ExistsCheckRule(Office::class, '荷主事業所')],
            'shipperRefNo' => ['nullable', 'string', 'max:250'],
            'primeForwarderId' => ['nullable', 'numeric', new ExistsCheckRule(Office::class, '元請フォワーダー')],
            'requireCollectKey' => ['nullable', 'boolean'],
            'requireExtraLashing' => ['nullable', 'boolean'],
            'requirePhotoForSale' => ['nullable', 'boolean'],
            'remarks' => ['nullable', 'string', 'max:250'],
            'innerCargoRemarks' => ['nullable', 'string', 'max:250'],
            'adminRemarks' => ['nullable', 'string', 'max:250'],
            'expectedJobType' => ['nullable', 'numeric', new Enum(JobType::class)]
        ];
    }

    /**
     * @see ScribeBodyParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'carModelId' => ['description' => '車種、外部キー', 'example' => '12'],
            'yardId' => ['description' => '保管YARD', 'example' => 2],
            'type' => ['description' => 'アクティビティ種別', 'example' => 2], // ChassisCarryActivity::class
            'moveInScheduleDate' => ['description' => '搬入予定日', 'example' => '2020-02-02 02:02'],
            'number' => ['description' => '車台番号', 'example' => '#E36-DG226-43544'],
            'displacement' => ['description' => '排気量(cc)', 'example' => '1800'],
            'weight' => ['description' => '重量(kg)', 'example' => '1200'],
            'extent' => ['description' => '車体長(cm)', 'example' => '480'],
            'width' => ['description' => '車体幅(cm)', 'example' => '140.55'],
            'height' => ['description' => '車体高さ(cm)', 'example' => '120'],
            'm3' => ['description' => '容積', 'example' => '8.330'],
            'movable' => ['description' => '可動フラグ', 'example' => 'true / false'],
            'shipperId' => ['description' => '荷主事業所、外部キー', 'example' => '24'],
            'shipperRefNo' => ['description' => '荷主参照番号', 'example' => '#3242gfdg342'],
            'primeForwarderId' => ['description' => '元請フォワーダー、外部キー', 'example' => '17'],
            'requireCollectKey' => ['description' => '鍵回収要望フラグ', 'example' => 'ture / false'],
            'requireExtraLashing' => ['description' => '強化ラッシング要望フラグ', 'example' => 'true / false'],
            'requirePhotoForSale' => ['description' => '販売用写真撮影要望フラグ', 'example' => 'true / false'],
            'remarks' => ['description' => '備考', 'example' => '備考コンテンツparaparapara....'],
            'innerCargoRemarks' => ['description' => 'インナーカーゴ備考', 'example' => 'インナーカーゴ備考コンテンツparaparapara....'],
            'adminRemarks' => ['description' => '管理用備考', 'example' => '管理用備考コンテンツparaparapara....'],
            'expectedJobType' => ['description' => '予定ジョブ種別', 'example' => '列挙型、1 or 2'],
        ];
    }
}
