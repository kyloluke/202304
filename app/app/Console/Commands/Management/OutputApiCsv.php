<?php

namespace App\Console\Commands\Management;

use App\Management\Apis\Api;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ReflectionClass;
use Symfony\Component\Finder\Finder;

/**
 * APIのCSVを出力するコマンド
 */
class OutputApiCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'management:output-api-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'APIのCSVを出力する';

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
            'カテゴリID',
            'カテゴリ',
            '名前',
            '備考',
            'メソッド',
            'パス',
            '優先度',
            '進捗',
            '担当者',
        ]);

        foreach ((new Finder)->in(app_path('Management/Apis'))->files() as $file) {

            $className = $namespace . str_replace(
                    ['/', '.php'],
                    ['\\', ''],
                    Str::after($file->getRealPath(), realpath(app_path()) . DIRECTORY_SEPARATOR)
                );

            if (is_subclass_of($className, Api::class) && !(new ReflectionClass($className))->isAbstract()) {
                /** @var Api $class */
                $class = new $className;
                fputcsv($stream, [
                    Str::after($file->getRealPath(), realpath(base_path()) . DIRECTORY_SEPARATOR),
                    $class->docId(),
                    $class->getApiCategory()?->ordinary(),
                    $class->getApiCategory()?->label(),
                    $class->docName(),
                    $class->docRemarks(),
                    $class->docHttpRequestMethod(),
                    $class->docPath(),
                    $class->docPriority()->label(),
                    $class->docProgress()?->label(),
                    $class->docInCharge()?->label(),
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
        Storage::put('management/api.csv', $contents);

        $this->line('/storage/app/management/api.csv にAPIの一覧を出力しました。');

        $this->line('End!');

        return Command::SUCCESS;
    }
}
