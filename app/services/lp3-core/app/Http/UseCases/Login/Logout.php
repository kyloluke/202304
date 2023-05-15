<?php

namespace Services\Lp3Core\App\Http\UseCases\Login;

use Services\Lp3Core\App\Models\User;

/**
 * ログアウト
 */
class Logout
{
    /**
     * 関数呼び出し
     *
     * @param User $user
     * @return bool
     */
    public function __invoke(User $user): bool
    {
        // !!!!! 認証のミドルウェアを作成するために作った仮の処理です ！！！！！

        // 現在のリクエストの認証に使用されたトークンを取り消す
        //$user->currentAccessToken()->delete();

        return true;
    }
}
