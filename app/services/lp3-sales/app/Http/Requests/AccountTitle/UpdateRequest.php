<?php

namespace Services\Lp3Sales\App\Http\Requests\AccountTitle;

use App\Http\Requests\Traits\ScribeQueryParametersHelper;
use Services\Lp3Sales\App\Http\Requests\Request;

/**
 * 勘定科目の更新リクエスト
 */
class UpdateRequest extends Request
{
    use ScribeQueryParametersHelper;

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
            'name_en' => ['required', 'string', 'max:200'],
            'code' => ['required', 'string', 'max:200'],
            'available' => ['required','bool'],
            'ordinary' => ['required', 'integer'],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::queryParameters()
     */
    public function queryParameters(): array
    {
        return [
            'id' => [
                'description' => 'ID',
                'example' => 1,
            ],
            'name' => [
                'description' => '名称',
                'example' => '資材仕入高',
            ],
            'name_en' => [
                'description' => '英語名称',
                'example' => 'Material purchase amount',
            ],
            'code' => [
                'description' => 'コード',
                'example' => '1421',
            ],
            'available' => [
                'description' => '利用可能フラグ',
                'example' => 'true',
            ],
            'ordinary' => [
                'description' => '順番',
                'example' => '1',
            ],
        ];
    }
}
