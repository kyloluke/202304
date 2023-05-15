<?php

namespace Services\Lp3Core\App\Http\UseCases\Password;

use Services\Lp3Core\App\Models\User;
use Illuminate\Auth\Events\PasswordReset as Reset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

/**
 * パスワードリセット
 */
class PasswordReset
{
    /**
     * 関数呼び出し
     */
    public function __invoke()
    {

    }
}
