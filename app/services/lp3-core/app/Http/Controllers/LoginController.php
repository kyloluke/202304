<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Services\Lp3Core\App\Http\Requests\Login\LoginRequest;
use Services\Lp3Core\App\Http\Requests\Login\LogoutRequest;
use Services\Lp3Core\App\Http\Requests\Login\ShowRequest;
use Services\Lp3Core\App\Http\Requests\Login\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\Login\PasswordRequest;
use Services\Lp3Core\App\Http\Requests\Login\RequestMfaEnableRequest;
use Services\Lp3Core\App\Http\Requests\Login\MfaEnableRequest;
use Services\Lp3Core\App\Http\Requests\Login\MfaDisableRequest;
use Services\Lp3Core\App\Http\Resources\Login\LoginResource;
use Services\Lp3Core\App\Http\Resources\Login\LogoutResource;
use Services\Lp3Core\App\Http\Resources\Login\ShowResource;
use Services\Lp3Core\App\Http\Resources\Login\UpdateResource;
use Services\Lp3Core\App\Http\Resources\Login\PasswordResource;
use Services\Lp3Core\App\Http\Resources\Login\RequestMfaEnableResource;
use Services\Lp3Core\App\Http\Resources\Login\MfaEnableResource;
use Services\Lp3Core\App\Http\Resources\Login\MfaDisableResource;
use Services\Lp3Core\App\Http\UseCases\Login\Login;
use Services\Lp3Core\App\Http\UseCases\Login\Logout;
use Services\Lp3Core\App\Http\UseCases\Login\Show;
use Services\Lp3Core\App\Http\UseCases\Login\Update;
use Services\Lp3Core\App\Http\UseCases\Login\Password;
use Services\Lp3Core\App\Http\UseCases\Login\RequestMfaEnable;
use Services\Lp3Core\App\Http\UseCases\Login\MfaEnable;
use Services\Lp3Core\App\Http\UseCases\Login\MfaDisable;
use Services\Lp3Core\App\Models\User;

/**
 * ログインコントローラー
 */
class LoginController extends Controller
{
    /**
     * ログイン
     *
     * @param LoginRequest $request
     * @param Login $useCase
     * @return LoginResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Login\LoginResource
     * @apiResourceModel Services\Lp3Core\App\Http\Resources\Login\LoginResourceModel
     */
    public function Login(LoginRequest $request, Login $useCase): LoginResource
    {
        return new LoginResource($useCase());
    }

    /**
     * ログアウト
     *
     * @param LogoutRequest $request
     * @param Logout $useCase
     * @return LogoutResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Login\LogoutResource
     * @apiResourceModel Services\Lp3Core\App\Http\Resources\Login\LogoutResourceModel
     */
    public function Logout(LogoutRequest $request, Logout $useCase): LogoutResource
    {
        return new LogoutResource($useCase($request->user()));
    }

    /**
     * 自身の表示
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Login\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function show(ShowRequest $request, Show $useCase): ShowResource
    {
        return new ShowResource($useCase($request->user()));
    }

    /**
     * 自身の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Login\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function update(UpdateRequest $request, Update $useCase): UpdateResource
    {
        return new UpdateResource($useCase());
    }

    /**
     * 自身のパスワードの更新
     *
     * @param PasswordRequest $request
     * @param Password $useCase
     * @return PasswordResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Login\PasswordResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function password(PasswordRequest $request, Password $useCase): PasswordResource
    {
        return new PasswordResource($useCase());
    }

    /**
     * 自身の二段階認証の有効化リクエスト(PINコードを通知)
     *
     * @param RequestMfaEnableRequest $request
     * @param RequestMfaEnable $useCase
     * @return RequestMfaEnableResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Login\RequestMfaEnableResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function requestMfaEnable(RequestMfaEnableRequest $request, RequestMfaEnable $useCase): RequestMfaEnableResource
    {
        return new RequestMfaEnableResource($useCase());
    }

    /**
     * 自身の二段階認証の有効化
     *
     * @param MfaEnableRequest $request
     * @param MfaEnable $useCase
     * @return MfaEnableResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Login\MfaEnableResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function mfaEnable(MfaEnableRequest $request, MfaEnable $useCase): MfaEnableResource
    {
        return new MfaEnableResource($useCase());
    }

    /**
     * 自身の二段階認証の無効化
     *
     * @param MfaDisableRequest $request
     * @param MfaDisable $useCase
     * @return MfaDisableResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Login\MfaDisableResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function mfaDisable(MfaDisableRequest $request, MfaDisable $useCase): MfaDisableResource
    {
        return new MfaDisableResource($useCase());
    }
}
