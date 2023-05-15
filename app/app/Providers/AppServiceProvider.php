<?php

namespace App\Providers;

use App\Console\Commands\Migrations\MigrateCommand;
use App\Console\Commands\Migrations\RollbackCommand;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Services\Lp3Core\App\Http\Middleware\AuthenticateForExportSimple;
use Services\Lp3Core\Exports\Middleware\Authenticate;
use Services\SampleAlice\App\Services\EventDispatch\EventDispatchService;
use Services\SampleAlice\App\Services\EventDispatch\EventDispatchServiceApp;
use Services\SampleAlice\App\Services\SampleAliceServiceMock;
use Services\SampleAlice\Exports\SampleAliceService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMigrationCommand();

        // 各サービスのDIの設定
        // lp3-core
        app()->bind(Authenticate::class, AuthenticateForExportSimple::class);

        // @todo サンプル用のサービスなので、production環境では無効にする
        app()->bind(EventDispatchService::class, fn() => new EventDispatchServiceApp());
        app()->bind(SampleAliceService::class, fn() => new SampleAliceServiceMock());
        // app()->bind(SampleAliceService::class, fn() => new SampleAliceServiceModel());
        // app()->bind(SampleAliceService::class, fn() => new SampleAliceServiceApi());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * マイグレーションのコマンドを登録する
     *
     * @return void
     */
    private function registerMigrationCommand()
    {
        // マイグレーションファイルのパスを指定する
        $paths = [
            'database/migrations',

            'services/exl-bfwd-ftp/database/migrations',
            'services/exl-inttra/database/migrations',
            'services/exl-sync-banc/database/migrations',
            'services/exl-sync-dp/database/migrations',
            'services/exl-sync-ftp/database/migrations',
            'services/exl-sync-metabase/database/migrations',
            'services/exl-sync-web/database/migrations',
            'services/lp3-bi/database/migrations',
            'services/lp3-cargo/database/migrations',
            'services/lp3-core/database/migrations',
            'services/lp3-job/database/migrations',
            'services/lp3-sales/database/migrations',
            'services/lp3-ship/database/migrations',

            // @todo サンプル用のサービスなので、production環境では無効にする
            'services/sample-alice/database/migrations',
            'services/sample-bob/database/migrations',
        ];

        $this->app->singleton(MigrateCommand::class, function ($app) use ($paths) {
            return new MigrateCommand($app['migrator'], $app[Dispatcher::class], $paths);
        });
        $this->app->singleton(RollbackCommand::class, function ($app) use ($paths) {
            return new RollbackCommand($app['migrator'], $paths);
        });
    }
}
