<?php

namespace Services\Lp3Sales\App\Http\UseCases\AccountTitle;

use Services\Lp3Sales\App\Http\Requests\AccountTitle\StoreRequest;
use Services\Lp3Sales\App\Models\AccountTitle;

/**
 * 勘定科目の登録
 */
class Store
{
    /**
     * 関数呼び出し
     */
    public function __invoke($data): AccountTitle
    {
        $accountTitle = new AccountTitle();
        $accountTitle->name = $data['name'];
        $accountTitle->name_en = $data['name_en'];
        $accountTitle->code = $data['code'];
        $accountTitle->available = $data['available'];
        $accountTitle->ordinary = $data['ordinary'];
        $accountTitle->save();

        return $accountTitle;
    }
}
