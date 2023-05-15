<?php

namespace Services\Lp3Ship\App\Http\Requests\ShipCompany;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Services\Lp3Ship\App\Http\Requests\Request;

/**
 * 船会社の削除リクエスト
 */
class DestroyRequest extends Request
{
    use ScribeBodyParametersHelper;

    public function rules ()
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
