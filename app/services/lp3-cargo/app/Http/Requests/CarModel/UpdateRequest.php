<?php

namespace Services\Lp3Cargo\App\Http\Requests\CarModel;

use Services\Lp3Cargo\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;

/**
 * 車種の更新リクエスト
 *
 * @urlParam id integer required The ID of the car brand.
 */
class UpdateRequest extends Request
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
            'carBrandId' => [
                        'required',
                        'integer',
                        Rule::exists('car_brands', 'id')->where(function ($query) {
                            $query->where('deleted_at', "=", NULL);
                        })
                    ],
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
                'example' => 'プリウス',
            ],
            'nameEn' => [
                'description' => '英語名称',
                'example' => 'Prius',
            ],
            'carBrandId' => [
                'description' => '自動車のブランドID',
                'example' => 1,
            ],
        ];
    }
}
