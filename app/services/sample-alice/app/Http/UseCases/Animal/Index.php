<?php

namespace Services\SampleAlice\App\Http\UseCases\Animal;

use Illuminate\Database\Eloquent\Collection;
use Services\SampleAlice\App\Models\Animal;
use Services\SampleAlice\App\UseCases\GoodMorning;

/**
 * 動物の一覧の取得
 */
class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(): Collection
    {
        // 複数のユースケースで共通の処理を実行する必要がある場合は、 /app/UseCases/ のユースケースを呼び出す
        $useCase = new GoodMorning();
        $useCase();

        return Animal::all();
    }
}
