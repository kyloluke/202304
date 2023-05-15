<?php

namespace Services\Lp3Core\App\Http\UseCases\InspectionType;

use Services\Lp3Core\App\Models\InspectionType;

class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): InspectionType
    {
        $InspectionType = InspectionType::findOrFail($id);
        return $InspectionType;
    }
}
