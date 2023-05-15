<?php

namespace Services\SampleBob\App\Console\UseCases;

use Services\SampleAlice\Exports\SampleAliceService;

/**
 * エクスポートされているサービスの使用サンプル
 */
class UseExportedService
{
    /**
     * コンストラクタ
     * @param SampleAliceService $service
     */
    public function __construct(private SampleAliceService $service)
    {

    }

    /**
     * 関数呼び出し
     *
     * @param callable $callback
     */
    public function __invoke(callable $callback)
    {
        $animals = $this->service->getAnimals();

        foreach ($animals as $animal) {
            $callback("id:{$animal['id']} name:{$animal['name']}");
        }

        $callback('count:' . count($animals));
    }
}
