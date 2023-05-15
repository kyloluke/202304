<?php

namespace Services\Lp3Core\App\Http\Requests\Region;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 地域の作成リクエスト
 */
class StoreRequest extends Request
{
    use ScribeBodyParametersHelper;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50', Rule::unique('regions', 'name')->where(fn($query) => $query->whereNull('deleted_at'))]
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => '地域名称',
                'example' => 'Asia',
            ],
        ];
    }
}
