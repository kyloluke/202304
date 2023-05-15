<?php

namespace Services\Lp3Ship\App\Http\UseCases\Ship;

use Services\Lp3Ship\App\Models\Ship;

/**
 * 本船の更新
 */
class Update
{
    /**
     * 関数呼び出し
     * 
     * @param array<string mixed> $requestData
     * @param int $id
     */
    public function __invoke($requestData, $id): Ship
    {
        $targetShip = Ship::findOrFail($id);
        $targetShip->update([
            'name' => $requestData['name'],
            'type' => $requestData['type'],
        ]);

        return $targetShip;
    }
}
