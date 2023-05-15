<?php

namespace Services\Lp3Core\App\Http\UseCases\Country;

use Services\Lp3Core\App\Models\Country;

class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Country
    {
        $country = Country::findOrFail($id);
        return $country;
    }
}
