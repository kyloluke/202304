<?php

namespace Services\Lp3Core\App\Http\Requests\Region;

use App\Http\Requests\Traits\ScribeQueryParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 地域の更新リクエスト
 */
class UpdateRequest extends Request
{
    use ScribeQueryParametersHelper;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50', Rule::unique('regions', 'name')->ignore($this->region)->where(fn($query) => $query->whereNull('deleted_at'))]
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'name' => [
                'description' => '地域名称',
                'example' => 'Asia',
            ],
        ];
    }
}
