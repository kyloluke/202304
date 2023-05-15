<?php

namespace App\Management\BusinessFlows;

/**
 * ユーザーログイン
 */
class UserLogin extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 33;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザーログイン';
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
        //SYNC・事業所ユーザーがLP3にログインする。
        (new \App\Management\Functions\Master\UserLogin())->main();

        //二要素認証を利用するかしないか
        $twofactorauthentication = true;

        if($twofactorauthentication){
            //2要素認証を利用する

            //LP3がSYNC・事業所ユーザーに2要素認証用確認コードを送信する。
            
            //SYNC・事業所ユーザーが受信したメール本文内の確認コードをLP3の確認コード入力画面に入力する。

            //LP3で入力された確認コードの認証を行う。
            (new \App\Management\Functions\Master\UserLoginTwoFactor())->main();
        }

        //SYNC・事業所ユーザーがLP3にログイン完了する

        return false;
    }
}
