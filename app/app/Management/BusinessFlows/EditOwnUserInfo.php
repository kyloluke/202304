<?php

namespace App\Management\BusinessFlows;

/**
 * 自身のユーザー情報の編集
 *
 * 全ユーザーが自分自身の情報を更新
 * 一般ユーザーでも変更可能
 */
class EditOwnUserInfo extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 39;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '自身のユーザー情報の編集';
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
        //全ユーザーが更新できる情報(ユーザーID・事業所・STATUS(有効・無効)以外)を更新する。
        (new \App\Management\Functions\Master\EditOwnUserInfo())->main();

        return false;
    }
}
