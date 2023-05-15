<?php

namespace App\Http\Requests\Traits;

/**
 * Scribeのクエリパラメータ用のヘルパートレイト
 */
trait ScribeQueryParametersHelper
{
    use ScribeHelper;

    /**
     * APIドキュメントのクエリパラメーターについての記述を生成するための値を返す
     * @return array
     * @see https://scribe.knuckles.wtf/laravel/documenting/query-body-parameters
     */
    abstract public function queryParameters(): array;
}
