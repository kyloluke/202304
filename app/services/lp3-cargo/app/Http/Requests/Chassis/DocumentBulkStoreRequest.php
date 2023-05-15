<?php

namespace Services\Lp3Cargo\App\Http\Requests\Chassis;

use Services\Lp3Cargo\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;

/**
 * 車輌の書類の一括作成リクエスト
 */
class DocumentBulkStoreRequest extends Request
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
        ];
    }

    /**
     * @see ScribeBodyParametersHelper::bodyParameters()
     */
    public function bodyParameters(): array
    {
        return [
        ];
    }
}
