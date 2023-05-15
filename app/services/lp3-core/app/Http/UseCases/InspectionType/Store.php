<?php

namespace Services\Lp3Core\App\Http\UseCases\InspectionType;

use Services\Lp3Core\App\Models\InspectionType;

class Store
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data): InspectionType
    {
        $inspectionType = new InspectionType();
        if (isset($data['name']))
            $inspectionType->name = $data['name'];

        if (count($data))
            $inspectionType->save();

        return $inspectionType;
    }
}
