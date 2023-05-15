<?php

namespace Services\Lp3Cargo\App\Http\Requests\CarBrand;

use Services\Lp3Cargo\App\Http\Requests\CarBrand\CarBrandCommonRequest;

/**
 * 自動車ブランドの削除リクエスト
 *
 * @urlParam id integer required The ID of the car brand.
 */
class DestroyRequest extends CarBrandCommonRequest
{
}
