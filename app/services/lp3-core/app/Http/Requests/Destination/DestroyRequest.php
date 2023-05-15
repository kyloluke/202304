<?php

namespace Services\Lp3Core\App\Http\Requests\Destination;

use Services\Lp3Core\App\Http\Requests\Request;

/**
 * 仕向地の削除リクエスト
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
