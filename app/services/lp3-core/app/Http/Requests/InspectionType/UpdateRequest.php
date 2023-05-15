<?php

namespace Services\Lp3Core\App\Http\Requests\InspectionType;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 検査種別の更新リクエスト
 */
class UpdateRequest extends Request
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
            'name' => ['required', 'max:50', Rule::unique('inspection_types', 'name')->ignore($this->inspection_type)->where(fn($query) => $query->whereNull('deleted_at'))],
        ];
    }

    /**
     * @see ScribeBodyParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => '検査種別名称',
                'example' => 'JAAI',
            ],
        ];
    }
}
