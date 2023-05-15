<?php

namespace Services\SampleAlice\App\Services\EventDispatch;

use App\Events\Event;

/**
 * イベント発行サービス
 */
interface EventDispatchService
{
    /**
     * イベントを発行する
     *
     * @param Event $event
     */
    public function dispatch(Event $event);
}
