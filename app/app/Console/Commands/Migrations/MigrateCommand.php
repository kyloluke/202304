<?php

namespace App\Console\Commands\Migrations;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\Collection;

/**
 * マイグレーションの実行コマンドのカスタマイズ版
 */
class MigrateCommand extends \Illuminate\Database\Console\Migrations\MigrateCommand
{
    private Collection $paths;

    /**
     * コンストラクタ
     *
     * @param Migrator $migrator
     * @param Dispatcher $dispatcher
     * @param string[] $paths
     */
    public function __construct(
        Migrator $migrator,
        Dispatcher $dispatcher,
        array $paths
    ) {
        parent::__construct($migrator, $dispatcher);

        $this->paths = collect($paths);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // コンストラクタで指定されたパスを、pathオプションに追加する
        if ($this->input->hasOption('path')) {
            $this->paths = $this->paths->concat(collect($this->input->getOption('path')));
        }
        $this->input->setOption('path', $this->paths->toArray());

        return parent::handle();
    }
}
