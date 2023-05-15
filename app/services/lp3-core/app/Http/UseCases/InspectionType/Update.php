<?php

namespace Services\Lp3Core\App\Http\UseCases\InspectionType;

use Services\Lp3Core\App\Models\InspectionType;

class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id, array $data): InspectionType
    {
        $inspectionType = InspectionType::findOrFail($id);
        if (isset($data['name']))
            $inspectionType->name = $data['name'];

        if (count($data))
            $inspectionType->save();
        return $inspectionType;
    }
}
