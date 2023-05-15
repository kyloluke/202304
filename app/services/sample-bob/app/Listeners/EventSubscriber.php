<?php

namespace Services\SampleBob\App\Listeners;

use App\Events\Event;
use Illuminate\Support\Facades\Log;
use Services\SampleAlice\Exports\Events\SampleAliceEvent;

/**
 * イベントサブスクライバ
 */
class EventSubscriber extends \App\Listeners\EventSubscriber
{
    /**
     * @see \App\Listeners\EventSubscriber::handleEvent()
     */
    public function handleEvent(Event $event)
    {
        switch (true) {
            case $event instanceof SampleAliceEvent:
                Log::debug('Sample Bob Service - handleSampleAliceEvent!');
                break;
            default:
                Log::debug('Sample Bob Service - handleEvent()');
        }
    }
}
