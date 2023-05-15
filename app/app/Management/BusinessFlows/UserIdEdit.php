<?php

namespace App\Management\BusinessFlows;

/**
 * ユーザーID編集
 */
class UserIdEdit extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 38;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ログインユーザーによる自身のユーザーIDの編集';
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
        while (true) {

            //SYNC・事業所のユーザーがIDを編集する。
            // @todo ↑別の業務フローとして作成する

            //ログインユーザーが自身のユーザーIDを編集する。
            //「ユーザーID編集」の機能を使用する
            // memo: 以下のフローはすべて「ユーザーID編集」の機能で実現する
            (new \App\Management\Functions\Master\UserIdEdit())->main();

            //LP3で入力されたユーザーIDのユニークチェック機能を行う。
            //チェックのタイミングは2つ。保存するボタンを押す(MUST)・入力更新後(都度)

            //同じ名前か否か
            $samename = true;

            if ($samename) {
                //同じ名前があった場合

                //同じ名前であるメッセージを表示する。
                //メッセージは入力ボックスの下に赤字で表示

            } else {
                //同じ名前でない場合

                //LP3で編集したユーザーIDを登録・更新する。

                break;
            }
            
        }

        return false;
    }
}
