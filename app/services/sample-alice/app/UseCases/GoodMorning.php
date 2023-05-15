<?php

namespace Services\SampleAlice\App\UseCases;

use Illuminate\Support\Facades\Log;

/**
 * Good Morning
 */
class GoodMorning
{
    /**
     * 関数呼び出し
     */
    public function __invoke()
    {
        Log::debug('Good morning!');
    }
}
