<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\User\IndexRequest;
use Services\Lp3Core\App\Http\Requests\User\ShowRequest;
use Services\Lp3Core\App\Http\Requests\User\StoreRequest;
use Services\Lp3Core\App\Http\Requests\User\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\User\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\User\CsvDownloadRequest;
use Services\Lp3Core\App\Http\Requests\User\UniqueLoginNameRequest;
use Services\Lp3Core\App\Http\Requests\User\UniqueMailRequest;
use Services\Lp3Core\App\Http\Requests\User\PasswordResetRequest;
use Services\Lp3Core\App\Http\Requests\User\UnlockRequest;
use Services\Lp3Core\App\Http\Requests\User\AgentLoginRequest;

use Services\Lp3Core\App\Http\Resources\User\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\User\ShowResource;
use Services\Lp3Core\App\Http\Resources\User\StoreResource;
use Services\Lp3Core\App\Http\Resources\User\UpdateResource;
use Services\Lp3Core\App\Http\Resources\User\DestroyResource;
use Services\Lp3Core\App\Http\Resources\User\CsvDownloadResource;
use Services\Lp3Core\App\Http\Resources\User\UniqueLoginNameResource;
use Services\Lp3Core\App\Http\Resources\User\UniqueMailResource;
use Services\Lp3Core\App\Http\Resources\User\PasswordResetResource;
use Services\Lp3Core\App\Http\Resources\User\UnlockResource;
use Services\Lp3Core\App\Http\Resources\User\AgentLoginResource;

use Services\Lp3Core\App\Http\UseCases\User\Index;
use Services\Lp3Core\App\Http\UseCases\User\Show;
use Services\Lp3Core\App\Http\UseCases\User\Store;
use Services\Lp3Core\App\Http\UseCases\User\Update;
use Services\Lp3Core\App\Http\UseCases\User\Destroy;
use Services\Lp3Core\App\Http\UseCases\User\CsvDownload;
use Services\Lp3Core\App\Http\UseCases\User\UniqueLoginName;
use Services\Lp3Core\App\Http\UseCases\User\UniqueMail;
use Services\Lp3Core\App\Http\UseCases\User\PasswordReset;
use Services\Lp3Core\App\Http\UseCases\User\Unlock;
use Services\Lp3Core\App\Http\UseCases\User\AgentLogin;

/**
 * ユーザーコントローラー
 */
class UserController extends Controller
{
    /**
     * ユーザー一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\User\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * ユーザーの表示
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * ユーザーの登録
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * ユーザーの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id,));
    }

    /**
     * ユーザーの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param Int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * ユーザーのCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\CsvDownloadResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

    /**
     * ユーザーのユーザーID(ログイン名)のユニークチェック
     *
     * @param UniqueLoginNameRequest $request
     * @param UniqueLoginName $useCase
     * @return UniqueLoginNameResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\UniqueLoginNameResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function uniqueLoginName(UniqueLoginNameRequest $request, UniqueLoginName $useCase): UniqueLoginNameResource
    {
        return new UniqueLoginNameResource($useCase());
    }

    /**
     * ユーザーのメールアドレスのユニークチェック
     *
     * @param UniqueMailRequest $request
     * @param UniqueMail $useCase
     * @return UniqueMailResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\UniqueMailResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function uniqueMail(UniqueMailRequest $request, UniqueMail $useCase): UniqueMailResource
    {
        return new UniqueMailResource($useCase());
    }

    /**
     * ユーザーのパスワードのリセット
     *
     * @param PasswordResetRequest $request
     * @param PasswordReset $useCase
     * @param int $id
     * @return PasswordResetResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\PasswordResetResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function passwordReset(PasswordResetRequest $request, PasswordReset $useCase, $id): PasswordResetResource
    {
        return new PasswordResetResource($useCase());
    }

    /**
     * ユーザーのアカウントロックの解除
     *
     * @param UnlockRequest $request
     * @param Unlock $useCase
     * @param int $id
     * @return UnlockResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\UnlockResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function unlock(UnlockRequest $request, Unlock $useCase, $id): UnlockResource
    {
        return new UnlockResource($useCase($id));
    }

    /**
     * 代理ログイン
     *
     * @param AgentLoginRequest $request
     * @param AgentLogin $useCase
     * @param int $id
     * @return AgentLoginResource
     * @apiResource Services\Lp3Core\App\Http\Resources\User\AgentLoginResource
     * @apiResourceModel Services\Lp3Core\App\Models\User
     */
    public function agentLogin(AgentLoginRequest $request, AgentLogin $useCase, $id): AgentLoginResource
    {
        return new AgentLoginResource($useCase($id));
    }
}
