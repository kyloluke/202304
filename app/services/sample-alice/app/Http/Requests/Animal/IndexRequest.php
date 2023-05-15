<?php

namespace Services\SampleAlice\App\Http\Requests\Animal;

use App\Http\Requests\Traits\ScribeQueryParametersHelper;
use Services\SampleAlice\App\Http\Requests\Request;

/**
 * 動物の一覧の取得リクエスト
 */
class IndexRequest extends Request
{
    use ScribeQueryParametersHelper;

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
            'keyword' => ['string'],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'keyword' => [
                'description' => 'キーワード',
                'example' => 'dog',
            ],
        ];
    }
}
