<?php

namespace Services\Lp3Core\App\Http\UseCases\Login;

use Services\Lp3Core\App\Models\User;

/**
 * ログイン
 */
class Login
{
    /**
     * 関数呼び出し
     *
     * @return string
     */
    public function __invoke(): string
    {
        // !!!!! 認証のミドルウェアを作成するために作った仮の処理です ！！！！！

        /** @var User $user */
        $user = User::factory()->create();

        $token = $user->createToken('example');

        return $token->plainTextToken;
    }
}
