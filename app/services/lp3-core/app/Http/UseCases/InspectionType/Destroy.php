<?php

namespace Services\Lp3Core\App\Http\UseCases\InspectionType;

use Services\Lp3Core\App\Models\InspectionType;

class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): InspectionType
    {
        $inspectionType = InspectionType::findOrFail($id);

        // $count = $inspectionType->countries()->count(); // 紐づいている国がある可能性あり
        $inspectionType->delete();
        return $inspectionType;
    }
}
