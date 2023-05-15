<?php

namespace Services\Lp3Ship\App\Http\Requests\Ship;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Ship\App\Enums\ShipType;

/**
 * 本船の更新リクエスト
 * 
 * @urlParam id integer required The ID of the ship
 */
class UpdateRequest extends ShipCommonRequest
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
            'name' => 'string|required|unique:ships,name',
            'type' => ['int', 'required', Rule::in(array_column(ShipType::cases(), 'value'))],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::bodyParameters()
     * 
     * @return array<string, mixed>
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => "本船名",
            ],

            'type' => [
                'description' => "本船種別（1,2,3のいずれか）",
            ]
        ];
    }
}
