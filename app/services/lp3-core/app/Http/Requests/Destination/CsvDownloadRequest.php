<?php

namespace Services\Lp3Core\App\Http\Requests\Destination;

use Services\Lp3Core\App\Http\Requests\Request;
use App\Http\Requests\Traits\ScribeBodyParametersHelper;

/**
 * 仕向地のCSVダウンロードリクエスト
 */
class CsvDownloadRequest extends Request
{
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
        return [];
    }
}
