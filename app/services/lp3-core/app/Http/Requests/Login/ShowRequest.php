<?php

namespace Services\Lp3Core\App\Http\Requests\Login;

use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 自身の取得リクエスト
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
        return !!$this->user();
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
