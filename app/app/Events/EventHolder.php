<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * イベントホルダー
 */
class EventHolder
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * コンストラクタ
     *
     * @param Event $event
     */
    public function __construct(private Event $event)
    {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * イベントを取得する
     *
     * @return Event
     */
    public function getEvent(): Event
    {
        return $this->event;
    }
}
