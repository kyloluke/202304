<?php

namespace Services\Lp3Cargo\App\Http\Requests\CarBrand;

use Services\Lp3Cargo\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;

/**
 * 自動車ブランドの登録リクエスト
 */
class StoreRequest extends Request
{
    use ScribeBodyParametersHelper;

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
            'name' => ['required', 'string', 'max:200'],
            'nameEn' => ['required', 'string', 'max:200'],
        ];
    }

    /**
     * @see ScribeBodyParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => '名称',
                'example' => 'トヨタ',
            ],
            'nameEn' => [
                'description' => '英語名称',
                'example' => 'TOYOTA',
            ],
        ];
    }
}
