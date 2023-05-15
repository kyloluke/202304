<?php

namespace Services\Lp3Core\App\Http\Requests\Country;

use App\Http\Requests\Traits\ScribeQueryParametersHelper;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 国の一覧の取得リクエスト
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
