<?php

namespace Services\Lp3Ship\App\Http\Requests\ShipCompany;

use App\Http\Requests\Traits\ScribeQueryParametersHelper;
use Services\Lp3Ship\App\Http\Requests\Request;

/**
 * 船会社の一覧の取得リクエスト
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
            'keyword' => ['max:1000']
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'keyword' => [
                'description' => '検索キーワード、検索対象カラムは「name」',
                'example' => 'xxx船会社',
            ]
        ];
    }
}
