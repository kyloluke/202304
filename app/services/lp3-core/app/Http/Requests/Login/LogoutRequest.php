<?php

namespace Services\Lp3Core\App\Http\Requests\Login;

use Services\Lp3Core\App\Http\Requests\Request;

/**
 * ログアウトリクエスト
 */
class LogoutRequest extends Request
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
