<?php

namespace Services\SampleAlice\App\Console\Commands;

use Illuminate\Console\Command;
use Services\SampleAlice\App\Console\UseCases\Hello as UseCase;

/**
 * Helloコマンド
 */
class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample-alice:hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * コンストラクタ
     *
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
        $this->line('Hello!');

        ($this->useCase)();

        $this->line('Goodbye!');

        return Command::SUCCESS;
    }
}
