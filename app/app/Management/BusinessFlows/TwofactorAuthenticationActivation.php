<?php

namespace App\Management\BusinessFlows;

/**
* 2要素認証有効化
*/
class TwofactorAuthenticationActivation extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 34;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '2要素認証有効化';
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
        //SYNC・事業所ユーザーがLP3にログイン後マイページに遷移する。

        //SYNC・事業所ユーザーが二要素認証機能を「オン」にする。

        //LP3で2要素認証有効化処理を行う。

        //LP3が登録されているメールアドレス宛に二要素認証用確認コードを送信。

        // @todo 二要素認証有効化機能を作成する。

        //SYNC・事業所ユーザーが受信したメール本文記載の二要素認証用確認コードを入力する。

        //LP3で二要素認証有効化処理をする。
        // @todo 二要素認証有効化機能を作成する。

        return false;
    }
}
