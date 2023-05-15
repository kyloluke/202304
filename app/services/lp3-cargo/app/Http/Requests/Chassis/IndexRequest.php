<?php

namespace Services\Lp3Cargo\App\Http\Requests\Chassis;

use App\Rules\ExistsCheckRule;
use Services\Lp3Cargo\App\Http\Requests\Request;
use Services\Lp3Cargo\Refers\Models\Office;
use Services\Lp3Cargo\Refers\Models\Yard;
use Services\Lp3Cargo\App\Models\CarModel;

/**
 * 車輌の取得リクエスト
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
            'controlNumber' => ['nullable', 'string', 'max:250'],
            'number' => ['nullable', 'string', 'max:250'],
            'yardId' => ['nullable', 'numeric', new ExistsCheckRule(Yard::class, 'ヤード')],
            'shipperId' => ['nullable', 'numeric', new ExistsCheckRule(Office::class, '荷主事業所')],
            'movable' => ['nullable', 'boolean'],
            'carModelId' => ['nullable', 'numeric', new ExistsCheckRule(CarModel::class, '社名')],
            'm3Min' => ['nullable', 'decimal:0,3', 'max:200'],
            'm3Max' => ['nullable', 'decimal:0,3', 'max:200'],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'controlNumber' => ['description' => '入庫NO.', 'example' => 'STK396902'],
            'number' => ['description' => '車台番号', 'example' => 'N17-004070'],
            'shipperId' => ['description' => '荷主事業所ID', 'example' => 12],
            'yardId' => ['description' => '保管ヤードID', 'example' => 33], // 保管ヤード
            'movable' => ['description' => '車両状態(可動フラグ)', 'example' => '可動 OR 不可動'],
            'moveInFirstTime' => ['description' => '初回搬入日', 'example' => '20220202'], // 初回搬入日時
            'carModelId' => ['description' => '車名ID', 'example' => 23],
            'm3Min' => ['description' => '容積最低値', 'example' => '3.5'],
            'm3Max' => ['description' => '容積最大値', 'example' => '10.35']
        ];
    }
}
