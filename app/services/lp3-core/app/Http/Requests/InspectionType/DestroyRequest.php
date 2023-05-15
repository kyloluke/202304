<?php

namespace Services\Lp3Core\App\Http\Requests\InspectionType;

use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 検査種別の削除リクエスト
 */
class DestroyRequest extends Request
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
