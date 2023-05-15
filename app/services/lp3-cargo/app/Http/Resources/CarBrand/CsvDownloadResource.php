<?php

namespace Services\Lp3Cargo\App\Http\Resources\CarBrand;

use Services\Lp3Cargo\App\Http\Resources\CsvDownloadResource as BaseCsvDownloadResource;

/**
 * 自動車ブランドのCSVダウンロードリソース
 */
class CsvDownloadResource extends BaseCsvDownloadResource
{
    protected function toArray()
    {
        return $this->collection
            ->map(function ($car_brand) {
                return [
                    $car_brand->id,
                    $car_brand->name,
                    $car_brand->name_en,
                ];
            })
            ->all();
    }

    protected function attributes()
    {
        return [
            'id',
            'name',
            'nameEn',
        ];
    }

    protected function fileName()
    {
        return 'car_brand.csv';
    }
}
