<?php

namespace Services\Lp3Cargo\App\Http\Requests\CarModel;

use Services\Lp3Cargo\App\Http\Requests\CarModel\CarModelCommonRequest;

/**
 * 車種の表示リクエスト
 *
 * @urlParam id integer required The ID of the car brand.
 */
class ShowRequest extends CarModelCommonRequest
{
}
