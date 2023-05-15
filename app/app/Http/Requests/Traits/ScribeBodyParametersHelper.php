<?php

namespace App\Http\Requests\Traits;

/**
 * Scribeのボディパラメータ用のヘルパートレイト
 */
trait ScribeBodyParametersHelper
{
    use ScribeHelper;

    /**
     * APIドキュメントのボディパラメーターについての記述を生成するための値を返す
     * @return array
     * @see https://scribe.knuckles.wtf/laravel/documenting/query-body-parameters
     */
    abstract public function bodyParameters(): array;
}
