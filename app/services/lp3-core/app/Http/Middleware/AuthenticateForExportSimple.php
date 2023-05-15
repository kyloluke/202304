<?php

namespace Services\Lp3Core\App\Http\Middleware;

use Closure;
use Illuminate\Auth\RequestGuard;
use Services\Lp3Core\App\Models\User;
use Services\Lp3Core\Exports\Models\AuthenticatedUser;

/**
 * 認証ミドルウェア(エクスポート用簡易版)
 */
class AuthenticateForExportSimple extends \Illuminate\Auth\Middleware\Authenticate implements
    \Services\Lp3Core\Exports\Middleware\Authenticate
{
    /**
     * @see \Illuminate\Auth\Middleware\Authenticate::handle()
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Laravel Sanctumを使って認証する
        $guardName = 'sanctum';
        $this->authenticate($request, [$guardName]);

        // 認証に成功した場合はエクスポート用のモデルを設定する
        /** @var RequestGuard $guard */
        $guard = $this->auth->guard($guardName);
        /** @var User $user */
        $user = $guard->user();

        $authenticatedUser = new AuthenticatedUser();
        $authenticatedUser->id = $user->id;
        $authenticatedUser->name = $user->name;

        $guard->setUser($authenticatedUser);

        return $next($request);
    }
}
