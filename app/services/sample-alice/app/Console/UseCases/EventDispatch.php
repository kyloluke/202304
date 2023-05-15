<?php

namespace Services\SampleAlice\App\Console\UseCases;

use Services\SampleAlice\App\Events\SampleAliceEvent;
use Services\SampleAlice\App\Services\EventDispatch\EventDispatchService;

/**
 * イベント発行
 */
class EventDispatch
{
    /**
     * コンストラクタ
     *
     * @param EventDispatchService $service
     */
    public function __construct(private EventDispatchService $service)
    {

    }

    /**
     * 関数呼び出し
     */
    public function __invoke()
    {
        $event = new SampleAliceEvent();
        $this->service->dispatch($event);
    }
}
