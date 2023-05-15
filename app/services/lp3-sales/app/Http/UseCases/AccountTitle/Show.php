<?php

namespace Services\Lp3Sales\App\Http\UseCases\AccountTitle;

use Illuminate\Database\Eloquent\Collection;
use Services\Lp3Sales\App\Models\AccountTitle;

/**
 * 勘定科目の取得
 */
class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): AccountTitle
    {
        return AccountTitle::findOrFail($id);
    }
}
