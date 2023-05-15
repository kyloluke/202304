<?php

namespace App\Management\Functions\Master;

/**
 * 新規ユーザー登録
 * メールアドレスを持っていないユーザー
 *
 */
class UserRegister
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //ユーザーマスタ画面が必要
        //      ユーザー名が入力できる
        //      ユーザーIDが入力できる
        //      仮パスワードを生成できる機能が必要(自動生成)
        //      保存ボタンが必要

        //SYNCユーザーか否か
        $sync = true;

        if ($sync) {
            //SYNCユーザーの場合
            //      権限属性を設定できる(Black,Platinum,Gold,Silver,Bronze)

        } else {
            //事業所ユーザーの場合
            //      権限区分を設定できる(管理者,一般)

        }

        //メールアドレスを登録するか否か
        $registeremale = true;

        if($registeremale){
            //メールアドレスを登録する場合
            //招待メールを登録したユーザーに送付する機能が必要
        }

         return false;
    }
}
