<?php

namespace Services\Lp3Core\App\Http\Middleware;

use Closure;

/**
 * 認証ミドルウェア
 */
class Authenticate extends \Illuminate\Auth\Middleware\Authenticate
{
    /**
     * @see \Illuminate\Auth\Middleware\Authenticate::handle()
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // Laravel Sanctumを使って認証する
        return parent::handle($request, $next, 'sanctum');
    }
}
