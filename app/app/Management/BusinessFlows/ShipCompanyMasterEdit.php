<?php

namespace App\Management\BusinessFlows;

/**
* 船社マスタ登録
*/
class ShipCompanyMasterEdit extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 28;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '船社マスタ登録';
    }

	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //基本的には追加編集しない。

        //変更する場合はNACCSコードを基に開発者側でまとめて更新する。

        //編集権限を持つのはシステム管理者。

        // @todo 開発者が使う機能として、船会社マスタの編集機能を作成する

        return false;
    }
}
