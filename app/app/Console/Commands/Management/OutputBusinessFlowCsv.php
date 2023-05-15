<?php

namespace App\Console\Commands\Management;

use App\Management\BusinessFlows\BusinessFlow;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ReflectionClass;
use Symfony\Component\Finder\Finder;

/**
 * 業務フローのCSVを出力するコマンド
 */
class OutputBusinessFlowCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'management:output-business-flow-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '業務フローのCSVを出力する';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('Start!');

        $namespace = app()->getNamespace();

        $stream = fopen('php://temp', 'r+b');

        // ヘッダ―部分
        fputcsv($stream, [
            'ファイルパス',
            'ID',
            '名前',
            '備考',

        ]);

        foreach ((new Finder)->in(app_path('Management/BusinessFlows'))->files() as $file) {

            $className = $namespace . str_replace(
                    ['/', '.php'],
                    ['\\', ''],
                    Str::after($file->getRealPath(), realpath(app_path()) . DIRECTORY_SEPARATOR)
                );

            if (is_subclass_of($className, BusinessFlow::class) && !(new ReflectionClass($className))->isAbstract()) {
                /** @var BusinessFlow $class */
                $class = new $className;
                fputcsv($stream, [
                    Str::after($file->getRealPath(), realpath(base_path()) . DIRECTORY_SEPARATOR),
                    $class->docId(),
                    $class->docName(),
                    $class->docRemarks(),
                ]);

            }
        }

        // Excel用の変換
        rewind($stream);
        $contents = stream_get_contents($stream);
        $contents = str_replace(PHP_EOL, "\r\n", $contents);
        $contents = mb_convert_encoding($contents, 'SJIS-win', 'UTF-8');

        fclose($stream);

        // 出力
        Storage::put('management/business-flow.csv', $contents);

        $this->line('/storage/app/management/business-flow.csv に業務フローの一覧を出力しました。');

        $this->line('End!');

        return Command::SUCCESS;
    }
}
