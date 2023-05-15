<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Responsable;

/**
 * CSVダウンロードリソースの基底クラス
 */
abstract class CsvDownloadResource implements Responsable
{
    protected $collection;

    public function __construct($resource)
    {
        $this->collection = $resource;
    }

    /**
     * CSVアウトプット
     */
    public function toResponse($request)
    {
        // Responseのヘッダー
        $header = [
            'Content-Type' => 'text/csv; charset=Shift_JIS',
        ];

        return response()->streamDownload(function () {
            $file = new \SplFileObject('php://output', 'wb');

            $csvHeader = $this->attributes();
            if (! empty($csvHeader)) {
                $file->fputcsv($this->convertCharset($csvHeader));
            }

            foreach ($this->toArray() as $fields) {
                $file->fputcsv($this->convertCharset($fields));
            }
        }, $this->fileName(), $header);
    }

    /**
     * 文字コード
     */
    private function convertCharset($fields)
    {
        return collect($fields)
            ->map(function ($item) {
                return mb_convert_encoding($item, 'SJIS-win', mb_internal_encoding());
            })
            ->all();
    }

    /**
     * 見出し
     */
    protected function attributes()
    {
        return [];
    }

    /**
     * 整形した配列を返却
     */
    protected function toArray()
    {
        return [];
    }

    /**
     * ダウンロードファイルの名前
     */
    protected function fileName()
    {
        return;
    }
}
