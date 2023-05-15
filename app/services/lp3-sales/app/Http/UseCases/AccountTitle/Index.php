<?php

namespace Services\Lp3Sales\App\Http\UseCases\AccountTitle;

use Illuminate\Pagination\LengthAwarePaginator;
use Services\Lp3Sales\App\Models\AccountTitle;

/**
 * 勘定科目の一覧の取得
 */
class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(): LengthAwarePaginator
    {
        return AccountTitle::paginate();
    }
}
