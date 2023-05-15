<?php

namespace App\Management\BusinessFlows;

/**
 * ユーザー情報変更(管理者)
 * SYNCユーザー及び事業所の管理者ユーザーが事業所の管理者・一般ユーザーに対して
 */
class UserInformationEdit extends BusinessFlow
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
        return 'ユーザー情報変更(管理者)';
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
        //SYNCユーザー及び事業所の管理者ユーザーが、ユーザーの情報(事業所・STATUS(有効・無効))を更新する
        (new \App\Management\Functions\Master\UserInformationEdit())->main();

        return false;
    }
}
