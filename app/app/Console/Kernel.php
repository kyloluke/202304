<?php

namespace App\Console;

use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use ReflectionClass;
use Symfony\Component\Finder\Finder;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        // 各サービスのコマンドを追加
        $this->loadServiceCommands([
            base_path('services/core/app/Console/Commands'),
            base_path('services/ship/app/Console/Commands'),

            // @todo サンプル用のサービスなので、production環境では無効にする
            base_path('services/sample-alice/app/Console/Commands'),
            base_path('services/sample-bob/app/Console/Commands'),
        ]);

        require base_path('routes/console.php');
    }

    /**
     * 各サービスのコマンドのロード
     *
     * load() を参考に作成。
     * load() では /app/ 以下のコマンドしか登録できないため、 /services/ 以下のコマンドを登録できるようにした。
     *
     * @see ConsoleKernel::load()
     */
    protected function loadServiceCommands($paths): void
    {
        $paths = array_unique(Arr::wrap($paths));

        $paths = array_filter($paths, function ($path) {
            return is_dir($path);
        });

        if (empty($paths)) {
            return;
        }

        foreach ((new Finder)->in($paths)->files() as $command) {

            $command = Str::after($command->getRealPath(), realpath(base_path()) . DIRECTORY_SEPARATOR);

            $c = collect(explode(DIRECTORY_SEPARATOR, $command));
            $className = str_replace('.php', '', $c->pop());
            $command = $c->map(fn($v) => Str::ucfirst(Str::camel($v)))->implode('\\') . '\\' . $className;

            if (is_subclass_of($command, Command::class) &&
                !(new ReflectionClass($command))->isAbstract()) {
                Artisan::starting(function ($artisan) use ($command) {
                    $artisan->resolve($command);
                });
            }
        }
    }
}
