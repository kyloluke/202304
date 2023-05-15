<?php

namespace Services\Lp3Ship\App\Http\UseCases\Ship;

use Services\Lp3Ship\App\Models\Ship;

/**
 * 本船の詳細情報の取得
 */
class Show
{
    /**
     * 関数呼び出し
     * 
     * @param int $id
     */
    public function __invoke($id): Ship
    {
        return Ship::findOrFail($id);
    }
}
