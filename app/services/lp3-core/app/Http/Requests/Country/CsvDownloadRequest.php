<?php

namespace Services\Lp3Core\App\Http\Requests\Country;

use Services\Lp3Core\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;

/**
 * 国のCSVダウンロードリクエスト
 */
class CsvDownloadRequest extends Request
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
        $orders = ['id', 'name', 'regionId', 'regionName'];
        foreach($orders as $value){
            array_push($orders,'-'.$value);
        }

        return [
            'id' => ['nullable', 'array'],
            'id.*' => 'int',
            'name' => ['nullable', 'string', 'max:50'],
            'regionName' => ['nullable', 'string', 'max:50'],
            'regionId' => ['nullable','integer'],
            'requiredInspectionId' => ['nullable', 'array'],
            'requiredInspectionId.*' => 'int',
            'requiredInspectionName' => ['nullable', 'array'],
            'requiredInspectionName.*' => 'string',
            'order' => Rule::in($orders),
        ];
    }

    /**
     * @see ScribeBodyParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'id.*' => [
                'description' => '国ID(配列形式で複数指定可能)',
                'example' => '[1,3,5]',
            ],
            'name' => [
                'description' => '国名称',
                'example' => 'アメリカ',
            ],
            'regionId' => [
                'description' => '地域ID',
                'example' => '地域テーブルの ID',
            ],
            'regionName' => [
                'description' => '地域名称',
                'example' => '北米',
            ],
            'requiredInspectionId.*' => [
                'description' => '検査種別ID(配列形式で指定)',
                'example' => '[1,3]',
            ],
            'requiredInspectionName.*' => [
                'description' => '検査種別名称(配列形式で指定)',
                'example' => '["JEVIC検査", "QISJ検査"]',
            ],
            'order' => [
                'description' => '昇順 OR 降順 + ソートさせたいカラム名  ※「id」なら昇順、「-id」なら降順',
                'example' => '-id',
            ]
        ];
    }
}
