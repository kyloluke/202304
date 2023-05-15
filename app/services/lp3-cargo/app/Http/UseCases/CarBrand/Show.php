<?php

namespace Services\Lp3Cargo\App\Http\UseCases\CarBrand;

use Services\Lp3Cargo\App\Models\CarBrand;

/**
 * 自動車ブランドの取得
 */
class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): CarBrand
    {
        return CarBrand::findOrFail($id);
    }
}
