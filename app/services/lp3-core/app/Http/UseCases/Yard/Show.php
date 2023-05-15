<?php

namespace Services\Lp3Core\App\Http\UseCases\Yard;

use Services\Lp3Core\App\Models\Yard;

/**
 * ヤードの詳細情報の取得
 */
class Show
{
    /**
     * 関数呼び出し
     * 
     * @param int $id
     */
    public function __invoke($id): Yard
    {
        return Yard::with(
            'representativeInYardGroup',
            'cargoTypes',
            'yardGroup',
            'country'
        )->findOrFail($id);
    }
}
