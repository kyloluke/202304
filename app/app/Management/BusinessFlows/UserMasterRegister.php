<?php

namespace App\Management\BusinessFlows;

/**
 * ユーザー登録
 *
 */
class UserMasterRegister extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 32;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザー登録';
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
        //メールアドレスを持っているか否か
        $havingemale = true;

        //SYNC OPまたは事業所のGold(管理者)ユーザーが新規に作成するユーザー情報を登録する。
        (new \App\Management\Functions\Master\UserRegister())->main();

        if ($havingemale) {
            //メールアドレスを持っている場合

            //登録完了後、LP3から登録したユーザーに招待メールが送られる。
            // ユーザー招待メール送付機能を作成する。

            //新規ユーザーが受信したメールのURLからLP3のパスワード設定画面を開く。

        } else {
            //メールアドレスを持っていない場合

            //SYNC OPまたは事業所のGold(管理者)ユーザーがユーザーIDと設定した仮パスワードを新規ユーザーに通知。(チャットツールや口頭など)

            //通知を受けた新規ユーザーが通知された仮パスワードでLP3にログインする。
        }

        //新規ユーザーが任意のパスワードを設定し、新規ユーザーのアクティベーションを完了させる。
        //パスワード設定完了後、パスワード設定完了メッセージとLPログイン画面へ遷移するボタンを表示する。
        (new \App\Management\Functions\Master\UserActivation())->main();

        return false;
    }
}
