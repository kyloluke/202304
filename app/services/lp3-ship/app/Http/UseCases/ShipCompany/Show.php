<?php

namespace Services\Lp3Ship\App\Http\UseCases\ShipCompany;

use Services\Lp3Ship\App\Models\ShipCompany;

class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke(string $id): ShipCompany
    {
        $shipCompany = ShipCompany::findOrFail($id);
        return $shipCompany;
    }
}
