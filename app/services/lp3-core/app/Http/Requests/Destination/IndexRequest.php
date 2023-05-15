<?php

namespace Services\Lp3Core\App\Http\Requests\Destination;

use App\Http\Requests\Traits\ScribeQueryParametersHelper;
use Services\Lp3Core\App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * 仕向地の一覧の取得リクエスト
 */
class IndexRequest extends Request
{
    use ScribeQueryParametersHelper;

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
