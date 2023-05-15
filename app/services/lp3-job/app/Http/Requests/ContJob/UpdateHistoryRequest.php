<?php

namespace Services\Lp3Job\App\Http\Requests\ContJob;

use Services\Lp3Job\App\Http\Requests\Request;

/**
 * コンテナJOBの変更履歴の一覧リクエスト
 */
class UpdateHistoryRequest extends Request
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