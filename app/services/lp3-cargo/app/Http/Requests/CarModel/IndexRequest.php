<?php

namespace Services\Lp3Cargo\App\Http\Requests\CarModel;

use Services\Lp3Cargo\App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * 車種の取得リクエスト
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
        $orders = ['id', 'name', 'nameEn', 'carBrandId', 'carBrandName', 'carBrandNameEn', 'updatedBy', 'createdBy', 'updatedAt', 'createdAt'];
        foreach($orders as $value){
            array_push($orders,'-'.$value);
        }

        return [
            'name' => ['nullable', 'string', 'max:200'],
            'nameEn' => ['nullable', 'string', 'max:200'],
            'carBrandId' => ['nullable', 'integer'],
            'carBrandName' => ['nullable', 'string', 'max:200'],
            'carBrandNameEn' => ['nullable', 'string', 'max:200'],
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
                'example' => 'プリウス',
            ],
            'nameEn' => [
                'description' => '英語名称',
                'example' => 'Prius',
            ],
            'carBrandId' => [
                'description' => '自動車ブランドID',
                'example' => '1',
            ],
            'carBrandName' => [
                'description' => '自動車ブランド名称',
                'example' => 'トヨタ',
            ],
            'carBrandNameEn' => [
                'description' => '自動車ブランド英語名称',
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
