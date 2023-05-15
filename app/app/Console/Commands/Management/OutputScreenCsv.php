<?php

namespace App\Console\Commands\Management;

use App\Management\Screens\Screen;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ReflectionClass;
use Symfony\Component\Finder\Finder;

/**
 * 画面のCSVを出力するコマンド
 */
class OutputScreenCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'management:output-screen-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '画面のCSVを出力する';

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
            'old-ID',
            'ID',
            'カテゴリID',
            'カテゴリ',
            '名前',
            '備考',
            '画面イメージ進捗',
            '画面イメージ担当者',
            'β版View優先度',
            'β版View進捗',
            'β版View担当者',
            'β版View完成予定日',
            'β版機能優先度',
            '画面イメージのURL'
        ]);

        foreach ((new Finder)->in(app_path('Management/Screens'))->files() as $file) {

            $className = $namespace . str_replace(
                    ['/', '.php'],
                    ['\\', ''],
                    Str::after($file->getRealPath(), realpath(app_path()) . DIRECTORY_SEPARATOR)
                );

            if (is_subclass_of($className, Screen::class) && !(new ReflectionClass($className))->isAbstract()) {
                /** @var Screen $class */
                $class = new $className;
                fputcsv($stream, [
                    Str::after($file->getRealPath(), realpath(base_path()) . DIRECTORY_SEPARATOR),
                    $class->docIdWhenDefiningRequirements(),
                    $class->docId(),
                    $class->docScreenCategory()?->ordinary(),
                    $class->docScreenCategory()?->label(),
                    $class->docName(),
                    $class->docRemarks(),
                    $class->docScreenImageProgress()->label(),
                    $class->docScreenImageInCharge()?->label(),
                    $class->docBetaViewPriority()->label(),
                    $class->docBetaViewProgress()?->label(),
                    $class->docBetaViewInCharge()?->label(),
                    $class->docBetaViewScheduledCompletionDateEx(),
                    $class->docBetaFeaturePriority()->label(),
                    $class->docScreenImageUrl(),
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
        Storage::put('management/screen.csv', $contents);

        $this->line('/storage/app/management/screen.csv に画面の一覧を出力しました。');

        $this->line('End!');

        return Command::SUCCESS;
    }
}
