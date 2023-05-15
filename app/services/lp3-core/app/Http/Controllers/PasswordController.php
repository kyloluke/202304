<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\Password\RequestPasswordResetRequest;
use Services\Lp3Core\App\Http\Requests\Password\PasswordResetRequest;

use Services\Lp3Core\App\Http\Resources\Password\RequestPasswordResetResource;
use Services\Lp3Core\App\Http\Resources\Password\PasswordResetResource;

use Services\Lp3Core\App\Http\UseCases\Password\RequestPasswordReset;
use Services\Lp3Core\App\Http\UseCases\Password\PasswordReset;

/**
 * パスワードコントローラー
 */
class PasswordController extends Controller
{
    /**
     * パスワードリセットのリクエスト
     *
     * @param RequestPasswordResetRequest $request
     * @param RequestPasswordReset $useCase
     * @return RequestPasswordResetResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Password\RequestPasswordResetResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function requestPasswordReset(RequestPasswordResetRequest $request, RequestPasswordReset $useCase): RequestPasswordResetResource
    {
        return new RequestPasswordResetResource($useCase());
    }

    /**
     * パスワードリセット
     *
     * @param PasswordResetRequest $request
     * @param PasswordReset $useCase
     * @return PasswordResetResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Password\PasswordResetResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function passwordReset(PasswordResetRequest $request, PasswordReset $useCase): PasswordResetResource
    {
        return new PasswordResetResource($useCase());
    }
}
