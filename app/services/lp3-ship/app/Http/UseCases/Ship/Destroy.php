<?php

namespace Services\Lp3Ship\App\Http\UseCases\Ship;

use Services\Lp3Ship\App\Models\Ship;

/**
 * 本船の削除
 */
class Destroy
{
    /**
     * 関数呼び出し
     * 
     * @param int $id
     */
    public function __invoke($id): Ship
    {
        $targetShip = Ship::findOrFail($id);
        $targetShip->delete();

        return $targetShip;
    }
}
