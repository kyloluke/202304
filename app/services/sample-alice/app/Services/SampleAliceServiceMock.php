<?php

namespace Services\SampleAlice\App\Services;

use Services\SampleAlice\Exports\SampleAliceService;

/**
 * 別サービスに機能を提供するサービスのモック版実装
 */
class SampleAliceServiceMock implements SampleAliceService
{
    /**
     * @see SampleAliceService::getAnimals()
     */
    public function getAnimals(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Dog',
            ],
            [
                'id' => 2,
                'name' => 'Cat',
            ],
            [
                'id' => 3,
                'name' => 'Horse',
            ],
        ];
    }
}
