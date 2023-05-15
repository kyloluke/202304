<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // 各サービスのルートを追加
            Route::middleware('api')
                ->prefix('api/exl-bfwd-ftp')
                ->group(base_path('services/exl-bfwd-ftp/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/exl-inttra')
                ->group(base_path('services/exl-inttra/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/exl-sync-banc')
                ->group(base_path('services/exl-sync-banc/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/exl-sync-dp')
                ->group(base_path('services/exl-sync-dp/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/exl-sync-ftp')
                ->group(base_path('services/exl-sync-ftp/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/exl-sync-metabase')
                ->group(base_path('services/exl-sync-metabase/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/exl-sync-web')
                ->group(base_path('services/exl-sync-web/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/lp3-bi')
                ->group(base_path('services/lp3-bi/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/lp3-cargo')
                ->group(base_path('services/lp3-cargo/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/lp3-core')
                ->group(base_path('services/lp3-core/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/lp3-job')
                ->group(base_path('services/lp3-job/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/lp3-sales')
                ->group(base_path('services/lp3-sales/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/lp3-ship')
                ->group(base_path('services/lp3-ship/routes/api.php'));

            // @todo サンプル用のサービスなので、production環境では無効にする
            Route::middleware('api')
                ->prefix('api/sample-alice')
                ->group(base_path('services/sample-alice/routes/api.php'));
            Route::middleware('api')
                ->prefix('api/sample-bob')
                ->group(base_path('services/sample-bob/routes/api.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
