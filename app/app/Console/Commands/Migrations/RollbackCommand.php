<?php

namespace App\Console\Commands\Migrations;

use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\Collection;

/**
 * マイグレーションのロールバックコマンドのカスタマイズ版
 */
class RollbackCommand extends \Illuminate\Database\Console\Migrations\RollbackCommand
{
    private Collection $paths;

    /**
     * コンストラクタ
     *
     * @param \Illuminate\Database\Migrations\Migrator $migrator
     * @param string[] $paths
     */
    public function __construct(
        Migrator $migrator,
        array $paths
    ) {
        parent::__construct($migrator);

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
