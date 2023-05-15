<?php

namespace Services\Lp3Ship\App\Http\UseCases\Ship;

use Services\Lp3Ship\App\Models\Ship;

/**
 * 本船の作成
 */
class Store
{
    /**
     * 関数呼び出し
     * 
     * @param array<string mixed> $requestData
     */
    public function __invoke($requestData): Ship
    {
        $createdShip = Ship::create([
            "name" => $requestData['name'],
            "type" => $requestData['type'],
        ]);


        return $createdShip;
    }
}
