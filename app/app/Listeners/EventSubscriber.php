<?php

namespace App\Listeners;

use App\Events\Event;
use App\Events\EventHolder;
use Illuminate\Events\Dispatcher;

/**
 * イベントサブスクライバの基底クラス
 */
abstract class EventSubscriber
{
    /**
     * イベントの処理
     *
     * @param Event $event
     */
    abstract public function handleEvent(Event $event);

    /**
     * サブスクライバのリスナを登録
     *
     * @param Dispatcher $dispatcher
     * @return array
     */
    final public function subscribe(Dispatcher $dispatcher): array
    {
        return [
            EventHolder::class => 'handleEventHolder',
        ];
    }

    /**
     * イベントホルダーの処理
     *
     * @param EventHolder $holder
     */
    final public function handleEventHolder(EventHolder $holder): void
    {
        $this->handleEvent($holder->getEvent());
    }
}
