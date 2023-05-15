<?php

namespace Services\SampleAlice\App\Events;

use App\Events\Event;

/**
 * 別サービスに発行するイベントの実装
 */
class SampleAliceEvent implements Event, \Services\SampleAlice\Exports\Events\SampleAliceEvent
{

}
