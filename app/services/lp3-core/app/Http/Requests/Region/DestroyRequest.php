<?php

namespace Services\Lp3Core\App\Http\Requests\Region;

use App\Http\Requests\Traits\ScribeQueryParametersHelper;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 地域の削除リクエスト
 */
class DestroyRequest extends Request
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
