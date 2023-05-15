<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\Organization\IndexRequest;
use Services\Lp3Core\App\Http\Requests\Organization\ShowRequest;
use Services\Lp3Core\App\Http\Requests\Organization\StoreRequest;
use Services\Lp3Core\App\Http\Requests\Organization\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\Organization\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\Organization\CsvDownloadRequest;

use Services\Lp3Core\App\Http\Resources\Organization\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\Organization\ShowResource;
use Services\Lp3Core\App\Http\Resources\Organization\StoreResource;
use Services\Lp3Core\App\Http\Resources\Organization\UpdateResource;
use Services\Lp3Core\App\Http\Resources\Organization\DestroyResource;
use Services\Lp3Core\App\Http\Resources\Organization\CsvDownloadResource;

use Services\Lp3Core\App\Http\UseCases\Organization\Index;
use Services\Lp3Core\App\Http\UseCases\Organization\Show;
use Services\Lp3Core\App\Http\UseCases\Organization\Store;
use Services\Lp3Core\App\Http\UseCases\Organization\Update;
use Services\Lp3Core\App\Http\UseCases\Organization\Destroy;
use Services\Lp3Core\App\Http\UseCases\Organization\CsvDownload;
use Services\Lp3Core\App\Http\UseCases\Organization\Exceptions\OrganizationDeleteException;
use Symfony\Component\HttpFoundation\Response;

/**
 * 組織コントローラー
 */
class OrganizationController extends Controller
{
    /**
     * 組織一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\Organization\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\Organization with=organizationLogoFile
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        $requestData = $request->only('nameKeyWords', 'systemUsage');
        return new IndexResourceCollection($useCase($requestData));
    }

    /**
     * 組織の表示
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Organization\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\Organization with=offices,users,yardGroups,organizationLogoFile
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 組織の登録
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Organization\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\Organization with=offices,users,yardGroups,organizationLogoFile
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        $requestData = $request->makeArrayForUseCase();
        return new StoreResource($useCase($requestData));
    }

    /**
     * 組織の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Organization\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\Organization with=offices,users,yardGroups,organizationLogoFile
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        $targetOrganization = $request->getTargetOrganization();
        $requestData = $request->makeArrayForUseCase($targetOrganization);
        return new UpdateResource($useCase($targetOrganization, $requestData));
    }

    /**
     * 組織の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param Int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Organization\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\Organization with=organizationLogoFile
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        try {
            return new DestroyResource($useCase($id));
        } catch (OrganizationDeleteException $e) {
            return response()->json(['message' => $this->createErrorResponseMessage($e->getMessage())], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * 組織のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Organization\CsvDownloadResource
     * @apiResourceModel Services\Lp3Core\App\Models\Organization
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

    private function createErrorResponseMessage($errorMessage)
    {
        switch ($errorMessage) {
            case OrganizationDeleteException::IN_USE;
                return "使用されている組織のため削除できません。";
                break;
        }
    }
}
