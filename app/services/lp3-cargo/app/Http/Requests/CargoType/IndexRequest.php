<?php

namespace Services\Lp3Cargo\App\Http\Requests\CargoType;

use Services\Lp3Cargo\App\Http\Requests\Request;

/**
 * 貨物種類の取得リクエスト
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
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
        ];
    }
}
