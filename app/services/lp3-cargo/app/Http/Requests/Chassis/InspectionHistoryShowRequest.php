<?php

namespace Services\Lp3Cargo\App\Http\Requests\Chassis;

use Services\Lp3Cargo\App\Http\Requests\Request;

/**
 * 車輌の検査履歴の詳細の取得リクエスト
 */
class InspectionHistoryShowRequest extends Request
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
