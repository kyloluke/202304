<?php

namespace Services\Lp3Core\App\Http\Requests\InspectionType;

use Services\Lp3Core\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;

/**
 * 検査種別のCSVダウンロードリクエスト
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
        $orders = ['id', 'name'];
        foreach($orders as $value){
            array_push($orders,'-'.$value);
        }

        return [
            'id' => ['nullable', 'array'],
            'id.*' => 'int',
            'name' => ['nullable', 'string', 'max:50'],
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
                'description' => '検査種別ID(配列形式で複数指定可能)',
                'example' => '[1,3,5]',
            ],
            'name' => [
                'description' => '名称',
                'example' => 'JEVIC検査',
            ],
            'order' => [
                'description' => '昇順 OR 降順 + ソートさせたいカラム名  ※「id」なら昇順、「-id」なら降順',
                'example' => '-id',
            ]
        ];
    }
}
