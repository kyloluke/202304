<?php

namespace Services\Lp3Sales\App\Http\UseCases\AccountTitle;

use Services\Lp3Sales\App\Http\Requests\AccountTitle\UpdateRequest;
use Services\Lp3Sales\App\Models\AccountTitle;

/**
 * 勘定科目の更新
 */
class Update
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id, $data): AccountTitle
    {
        $accountTitle = AccountTitle::findOrFail($id);
        $accountTitle->name = $data['name'];
        $accountTitle->name_en = $data['name_en'];
        $accountTitle->code = $data['code'];
        $accountTitle->available = $data['available'];
        $accountTitle->ordinary = $data['ordinary'];
        $accountTitle->save();

        return $accountTitle;
    }
}
