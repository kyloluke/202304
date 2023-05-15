<?php

namespace Services\Lp3Ship\App\Http\Requests\Ship;

use Services\Lp3Ship\App\Http\Requests\Request;

/**
 * リクエストの基底クラス
 */
class ShipCommonRequest extends Request
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
}
