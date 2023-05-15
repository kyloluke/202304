<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * 登録するサブスクライバクラス
     *
     * @var array
     */
    protected $subscribe = [
        // 各サービスのイベントサブスクライバを登録
        \Services\ExlBfwdFtp\App\Listeners\EventSubscriber::class,
        \Services\ExlInttra\App\Listeners\EventSubscriber::class,
        \Services\ExlSyncBanc\App\Listeners\EventSubscriber::class,
        \Services\ExlSyncDp\App\Listeners\EventSubscriber::class,
        \Services\ExlSyncFtp\App\Listeners\EventSubscriber::class,
        \Services\ExlSyncMetabase\App\Listeners\EventSubscriber::class,
        \Services\ExlSyncWeb\App\Listeners\EventSubscriber::class,
        \Services\Lp3Bi\App\Listeners\EventSubscriber::class,
        \Services\Lp3Cargo\App\Listeners\EventSubscriber::class,
        \Services\Lp3Core\App\Listeners\EventSubscriber::class,
        \Services\Lp3Job\App\Listeners\EventSubscriber::class,
        \Services\Lp3Sales\App\Listeners\EventSubscriber::class,
        \Services\Lp3Ship\App\Listeners\EventSubscriber::class,

        // @todo サンプル用のサービスなので、production環境では無効にする
        \Services\SampleAlice\App\Listeners\EventSubscriber::class,
        \Services\SampleBob\App\Listeners\EventSubscriber::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
