<?php

namespace Services\SampleBob\App\Console\Commands;

use Illuminate\Console\Command;
use Services\SampleBob\App\Console\UseCases\UseExportedService as UseCase;

/**
 * エクスポートされているサービスの使用サンプルコマンド
 */
class UseExportedService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample-bob:use-exported-service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * コンストラクタ
     * @param UseCase $useCase
     */
    public function __construct(private UseCase $useCase)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ($this->useCase)(fn($line) => $this->line($line));

        return Command::SUCCESS;
    }
}
