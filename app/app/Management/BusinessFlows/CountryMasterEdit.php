<?php

namespace App\Management\BusinessFlows;

/**
 * 国マスタ登録
 */
class CountryMasterEdit extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 26;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '国マスタ登録';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'NACCSの情報参照しているので追加編集無し（更新頻度が極端に低い）';
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

        // @todo 開発者が使う機能として、国マスタの編集機能を作成する

        return false;
    }
}
