<?php

namespace App\Management\BusinessFlows\OSL;

use App\Management\BusinessFlows\BusinessFlow;

/**
 * 船積登録
 */
class ShippingRegistrarion extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 7;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '船積登録';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '船積情報登録(本船の登録)';
    }

     /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNC OP(OSL)が航路スケジュールを登録する。
        // @todo 船積情報を登録する機能を作成する。

        return false;
    }

}
