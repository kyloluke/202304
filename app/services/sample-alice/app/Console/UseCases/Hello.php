<?php

namespace Services\SampleAlice\App\Console\UseCases;

use Services\SampleAlice\App\UseCases\GoodMorning;

/**
 * Hello
 */
class Hello
{
    /**
     * 関数呼び出し
     */
    public function __invoke()
    {
        // 複数のユースケースで共通の処理を実行する必要がある場合は、 /app/UseCases/ のユースケースを呼び出す
        $useCase = new GoodMorning();
        $useCase();
    }
}
