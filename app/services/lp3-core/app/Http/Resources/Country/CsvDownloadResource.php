<?php

namespace Services\Lp3Core\App\Http\Resources\Country;

use Services\Lp3Core\App\Http\Resources\CsvDownloadResource as BaseCsvDownloadResource;
use Services\Lp3Core\App\Models\InspectionType;

/**
 * 国のCSVダウンロードリソース
 */
class CsvDownloadResource extends BaseCsvDownloadResource
{
    protected function toArray()
    {
        return $this->collection->map(function ($country) {
            return [
                $country->id,
                $country->name,
                $country->region_id,
                $country->region->name,
                // 配列化したCollectionを文字列へ変換
                $country->requiredInspections->isNotEmpty() ? implode(",", $country->requiredInspections->map(function (InspectionType $type) {
                    return $type->name;
                })->toArray()) : null,
            ];
        });
    }

    protected function attributes()
    {
        return [
            'id',
            'name',
            'regionId',
            'regionName',
            'requiredInspections',
        ];
    }

    protected function fileName()
    {
        return 'country.csv';
    }
}
