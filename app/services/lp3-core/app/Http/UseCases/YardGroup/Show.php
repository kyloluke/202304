<?php

namespace Services\Lp3Core\App\Http\UseCases\YardGroup;

use Services\Lp3Core\App\Models\YardGroup;

/**
 * ヤードグループの詳細情報の取得
 */
class Show
{
    /**
     * 関数呼び出し
     * 
     * @param int $id
     */
    public function __invoke($id): YardGroup
    {
        return YardGroup::with(
            'yards',
            'regularHolidays',
            'irregularHolidays',
            'irregularBusinessDays',
            'defaultPol',
            'representativeYard',
            'managers',
            'officeBusinessTypes'
        )->findOrFail($id);
    }
}
