<?php

namespace Services\Lp3Core\App\Http\Requests\InspectionType;

use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 検査種別の一覧の取得リクエスト
 */
class IndexRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [];
    }
}
