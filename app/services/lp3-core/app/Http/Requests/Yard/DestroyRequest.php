<?php

namespace Services\Lp3Core\App\Http\Requests\Yard;

use Services\Lp3Core\App\Http\Requests\Request;

/**
 * ヤードの削除リクエスト
 * 
 * @urlParam id integer required The ID of the yard
 */
class DestroyRequest extends Request
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
