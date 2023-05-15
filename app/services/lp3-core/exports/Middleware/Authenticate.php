<?php

namespace Services\Lp3Core\Exports\Middleware;

/**
 * 認証ミドルウェア
 */
interface Authenticate
{
    // 認証が必要なAPIの場合は以下の用にルーティングを設定してください。
    //
    //```
    //use Services\Lp3Core\Exports\Middleware\Authenticate;
    //
    //Route::middleware([Authenticate::class])->group(function () {
    //    Route::apiResource('/sample', SampleController::class);
    //});
    //```
    //
    // 認証後は以下のような方法で認証されたユーザーを取得できます
    //
    //```
    //use Illuminate\Support\Facades\Auth;
    //
    //$user = Auth::user();
    //```
    //
    //```
    //$user = request()->user();
    //```
}


