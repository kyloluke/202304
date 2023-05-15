<?php

namespace Services\SampleAlice\App\Services;

use Illuminate\Support\Facades\Http;
use Services\SampleAlice\Exports\SampleAliceService;

/**
 * 別サービスに機能を提供サービスのAPI版実装
 */
class SampleAliceServiceApi implements SampleAliceService
{
    /**
     * @see SampleAliceService::getAnimals()
     */
    public function getAnimals(): array
    {
        // @todo URLを env や config で変更できるようにする必要あり
        $response = Http::get('http://nginx:8000/api/sample-alice/animal');
        return $response->json('data');
    }
}
