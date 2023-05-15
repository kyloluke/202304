<?php

namespace Services\Lp3Core\App\Http\Resources\InspectionType;

use Services\Lp3Core\App\Http\Resources\CsvDownloadResource as BaseCsvDownloadResource;

/**
 * 検査種別のCSVダウンロードリソース
 */
class CsvDownloadResource extends BaseCsvDownloadResource
{
    protected function toArray()
    {
        return $this->collection
            ->map(function ($inspection_type) {
                return [
                    $inspection_type->id,
                    $inspection_type->name,
                ];
            })
            ->all();
    }

    protected function attributes()
    {
        return [
            'id',
            'name',
        ];
    }

    protected function fileName()
    {
        return 'inspection_type.csv';
    }
}
