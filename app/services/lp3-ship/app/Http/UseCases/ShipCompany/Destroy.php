<?php

namespace Services\Lp3Ship\App\Http\UseCases\ShipCompany;

use Services\Lp3Ship\App\Models\ShipCompany;

class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke(string $id): ShipCompany
    {
        $shipCompany = ShipCompany::findOrFail($id);
        $shipCompany->delete();
        return $shipCompany;
    }
}
