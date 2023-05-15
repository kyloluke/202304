<?php

namespace Services\Lp3Sales\App\Http\UseCases\AccountTitle;

use Illuminate\Pagination\LengthAwarePaginator;
use Services\Lp3Sales\App\Models\AccountTitle;

/**
 * 勘定科目の削除
 */
class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): LengthAwarePaginator
    {
        AccountTitle::findOrFail($id);

        AccountTitle::destroy($id); // TODO: この削除方法でないとdeletingが発火しない

        return AccountTitle::paginate();
    }
}
