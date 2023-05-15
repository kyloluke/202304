<?php

namespace Services\SampleAlice\App\Http\UseCases\Animal;

use Services\SampleAlice\App\Models\Animal;

/**
 * 動物の詳細の取得
 */
class Show
{
    /**
     * 関数呼び出し
     *
     * @param int $id
     * @return Animal
     */
    public function __invoke(int $id): Animal
    {
        return Animal::findOrFail($id);
    }
}
