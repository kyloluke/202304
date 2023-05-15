<?php

namespace Services\Lp3Cargo\App\Http\Requests\Chassis;

use Services\Lp3Cargo\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;


/**
 * 複数車輌の寸法用CSVのインポートリクエスト
 */
class CsvDimensionImportRequest extends Request
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