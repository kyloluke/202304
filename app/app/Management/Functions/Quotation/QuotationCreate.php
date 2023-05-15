<?php

namespace App\Management\Functions\Quotation;

use App\Management\Screens\Sales\QuotationEditScreen;

/**
 * 見積もりの作成
 */
class QuotationCreate
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // 見積もりの編集画面の作成モード
        (new QuotationEditScreen())->createMode();

        // @todo 「見積もりの作成のAPI」を作成する

        return false;
    }
}
