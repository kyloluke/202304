<?php

namespace App\Management\BusinessFlows;

/**
 * ユーザーパスワード変更
 */
class UserPasswordEdit extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 35;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザーパスワード変更';
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
        //パスワードを知っているかいないか。
        $password = true;

        if ($password) {
            //パスワードを知っている場合

            //SYNC・事業所ユーザーがLP3にログイン後マイページに遷移する。

            //SYNC・事業所ユーザーが新しいパスワードを設定する。

            //LP3でユーザーのパスワード変更処理を行う。
            (new \App\Management\Functions\Master\UserPasswordEdit())->main();
        } else {
            //パスワードを忘れてしまった場合。

            //メールアドレスを設定しているか
            $setemail = true;

            if ($setemail) {
                //メールアドレスを設定している場合

                //SYNC・事業所ユーザーがLP3のログイン画面からパスワードリセット画面を表示。

                //SYNC・事業所ユーザーがパスワードリセット画面でメールアドレスを入力する。

                //LP3が入力されたメールアドレス宛てにパスワードリセット用のURLが記載されたメールを送信する。

                //SYNC・事業所ユーザーが受信したメールからパスワードリセット用URLを開く

                //SYNC・事業所ユーザーが新しいパスワードを設定する。

                //LP3がパスワードリセット完了メールをユーザーに送信する。
                (new \App\Management\Functions\Master\UserPasswordEditWithMail())->main();

                //SYNC・事業所ユーザーはパスワードリセット完了メールを受信して終了
            } else {
                //メールアドレス設定していない場合

                //SYNC・事業所ユーザー(Bronze)がLP3のログインフォームより「パスワードを忘れた方はこちらのリンク」を選択する。

                //LP3がSYNC・事業所管理者に対して、パスワードリセット依頼メールを送信する。

                //SYNC・事業所管理者がパスワードリセット依頼メールを受け取る。

                //SYNC・事業所管理者がLP3のユーザーマスタにて仮パスワードを再設定。

                //変更後のパスワードをチャットツールや口頭でSYNC・事業所ユーザー(Bronze)に通知する。

                //SYNC・事業所ユーザー(Bronze)が通知された仮パスワードを使ってLP3にログインする。

                //SYNC・事業所ユーザー(Bronze)が任意のパスワードに変更する。
                (new \App\Management\Functions\Master\UserPasswordEditNoMail())->main();
            }
        }
        return false;
    }
}
