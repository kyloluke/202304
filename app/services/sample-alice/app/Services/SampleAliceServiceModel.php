<?php

namespace Services\SampleAlice\App\Services;

use Services\SampleAlice\App\Http\Requests\Request;
use Services\SampleAlice\App\Http\Resources\Animal\IndexResourceCollection;
use Services\SampleAlice\App\Models\Animal;
use Services\SampleAlice\Exports\SampleAliceService;

/**
 * 別サービスに機能を提供するサービスのモデル版実装
 */
class SampleAliceServiceModel implements SampleAliceService
{
    /**
     * @see SampleAliceService::getAnimals()
     */
    public function getAnimals(): array
    {
        $animals = Animal::all();
        return (new IndexResourceCollection($animals))->toArray(new Request());
    }
}
