<?php

namespace Services\Lp3Core\App\Http\UseCases\Region;

use Services\Lp3Core\App\Models\Region;

class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Region
    {
        $region = Region::findOrFail($id);
        // $count = $Region->countries()->count(); // 紐づいている国がある、削除確認必要ありでしょうか？
        $region->delete();
        return $region;
    }
}
