<?php

namespace Services\Lp3Core\App\Http\UseCases\Login;

use Services\Lp3Core\App\Models\User;

/**
 * 自身の取得
 */
class Show
{
    /**
     * 関数呼び出し
     *
     * @param User $user
     * @return User
     */
    public function __invoke(User $user): User
    {
        return $user;
    }
}
