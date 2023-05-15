<?php

namespace Services\Lp3Sales\App\Http\Requests\Job;

use Services\Lp3Sales\App\Http\Requests\Request;

/**
 * 複数JOBのFREIGHT請求明細の一覧の取得リクエスト
 */
class BulkBillingItemIndexRequest extends Request
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
