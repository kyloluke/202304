<?php

namespace App\Management\BusinessFlows;

/**
 * 代理ログイン(ユーザーマスタ)
 */
class UserProxyLogin extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 42;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '代理ログイン';
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
        //システム管理者がログイン対象となるユーザーの検索をする。
        (new UserSearch())->main();

        //システム管理者が対象となるユーザーの「代理ログイン」ボタンを押す。
        //  LP3は指定されているユーザーとしてログインする。
        (new \app\Management\Functions\Master\UserProxyLogin())->main();

        //システム管理者が代理の操作後に元のユーザーに戻る
        (new \app\Management\Functions\Master\UserReLogin())->main();

        return false;
    }
}
