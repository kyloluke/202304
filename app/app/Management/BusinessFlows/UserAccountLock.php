<?php

namespace App\Management\BusinessFlows;

/*
* ユーザーアカウントロック
*/
class UserAccountLock extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 37;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザーアカウントロック';
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
        //SYNCユーザーまたは事業所の一般ユーザーがログインフォーム上でパスワード入力を10回間違える。
        //  LP3でアカウントロック処理を行う。
        //  アカウントロックは60分で自動解除される。
        //  アカウントロック実行メールをSYNCまたは事業所管理者ユーザーにメール送信する。
        (new \App\Management\Functions\Master\UserLogin())->main();

        //SYNCまたは事業所管理者ユーザーがアカウントロック実行メールを受信する。

        //アカウントロック解除が必要な場合、SYNCまたは事業所管理者ユーザーがアカウントロック解除設定を実施する。
        //SYNCユーザーまたは事業所の一般ユーザーはアカウントロック解除の連絡メールを受け取る。
        // @todo アカウントロック解除の連絡メールをシステムが送信するのか、SYNCまたは事業所管理者ユーザーが手動で送信するのか要確認
        (new \App\Management\Functions\Master\UserAccountUnlock())->main();

        //SYNCユーザーまたは事業所の一般ユーザーがLP3にログインを行う。

        //パスワードが分からない場合はパスワードリセットフローを行う。
        (new UserPsswordEdit())->main();

        return false;
    }
}
