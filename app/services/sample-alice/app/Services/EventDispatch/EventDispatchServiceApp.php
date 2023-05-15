<?php

namespace Services\SampleAlice\App\Services\EventDispatch;

use App\Events\EventHolder;
use App\Events\Event;

/**
 * イベントサービス(アプリケーション版)
 */
class EventDispatchServiceApp implements EventDispatchService
{
    /**
     * @see EventDispatchService::dispatch()
     */
    public function dispatch(Event $event)
    {
        event(new EventHolder($event));
    }
}
