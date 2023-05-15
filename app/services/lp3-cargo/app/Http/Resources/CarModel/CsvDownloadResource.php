<?php

namespace Services\Lp3Cargo\App\Http\Resources\CarModel;

use Services\Lp3Cargo\App\Http\Resources\CsvDownloadResource as BaseCsvDownloadResource;

/**
 * 複数車種のCSVのエクスポートリソース
 */
class CsvDownloadResource  extends BaseCsvDownloadResource
{
    protected function toArray()
    {
        return $this->collection
            ->map(function ($car_model) {
                return [
                    $car_model->id,
                    $car_model->name,
                    $car_model->name_en,
                    $car_model->carBrand->id,
                    $car_model->carBrand->name,
                    $car_model->carBrand->name_en,
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
            'carBrandId',
            'carBrandName',
            'carBrandNameEn',
        ];
    }

    protected function fileName()
    {
        return 'car_model.csv';
    }
}
