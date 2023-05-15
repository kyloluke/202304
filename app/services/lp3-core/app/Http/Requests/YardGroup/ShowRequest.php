<?php

namespace Services\Lp3Core\App\Http\Requests\YardGroup;

use Services\Lp3Core\App\Http\Requests\Request;

/**
 * ヤードグループの詳細情報の取得リクエスト
 * 
 * @urlParam id integer required The ID of the yardGroup
 */
class ShowRequest extends Request
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
        return [];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [];
    }
}
