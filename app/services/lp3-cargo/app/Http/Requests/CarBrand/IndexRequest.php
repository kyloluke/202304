<?php

namespace Services\Lp3Cargo\App\Http\Requests\CarBrand;

use Services\Lp3Cargo\App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * 自動車ブランドの取得リクエスト
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
        $orders = ['id', 'name', 'nameEn', 'updatedBy', 'createdBy', 'updatedAt', 'createdAt'];
        foreach($orders as $value){
            array_push($orders,'-'.$value);
        }

        return [
            'name' => ['nullable', 'string', 'max:200'],
            'nameEn' => ['nullable', 'string', 'max:200'],
            'page' => ['nullable', 'integer'],
            'order' => Rule::in($orders),
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'name' => [
                'description' => '名称',
                'example' => 'トヨタ',
            ],
            'nameEn' => [
                'description' => '英語名称',
                'example' => 'TOYOTA',
            ],
            'page' => [
                'description' => 'ページ',
                'example' => '1',
            ],
            'order' => [
                'description' => '昇順 OR 降順 + ソートさせたいカラム名  ※「id」なら昇順、「-id」なら降順',
                'example' => '-id',
            ]
        ];
    }
}
