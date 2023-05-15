<?php

namespace Services\Lp3Job\App\Http\Controllers;

use Services\Lp3Job\App\Http\Requests\Job\DownloadRequest;
use Services\Lp3Job\App\Http\Resources\Job\DownloadResource;
use Services\Lp3Job\App\Http\UseCases\Job\Download;

/**
 * JOBコントローラー
 */
class JobController extends Controller
{
    /**
     * 複数JOBの書類の一括ダウンロード
     *
     * @param DownloadRequest $request
     * @param Download $useCase
     * @return DownloadResource
     * @apiResource Services\Lp3Job\App\Http\Resources\Job\DownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\Job
     */
    public function download(DownloadRequest $request, Download $useCase): DownloadResource
    {
        return new DownloadResource($useCase());
    }

}
