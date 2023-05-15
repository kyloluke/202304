<?php

namespace Services\Lp3Job\App\Http\Requests\ContJob;

use Services\Lp3Job\App\Http\Requests\Request;

/**
 * コンテナJOBの詳細の取得(共有リンク用)リクエスト
 */
class ShareRequest extends Request
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
        return [];
    }
}
