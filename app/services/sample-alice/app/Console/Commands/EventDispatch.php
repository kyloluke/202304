<?php

namespace Services\SampleAlice\App\Console\Commands;

use Illuminate\Console\Command;
use Services\SampleAlice\App\Console\UseCases\EventDispatch as UseCase;

/**
 * イベント発行コマンド
 */
class EventDispatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample-alice:event-dispatch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * コンストラクタ
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
        ($this->useCase)();

        return Command::SUCCESS;
    }
}
