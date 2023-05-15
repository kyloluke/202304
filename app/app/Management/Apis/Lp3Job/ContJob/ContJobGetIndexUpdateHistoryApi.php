<?php

namespace App\Management\Apis\Lp3Job\ContJob;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Priority;
use App\Management\Enums\Worker;

/**
 * コンテナJOBの変更履歴の一覧API
 */
class ContJobGetIndexUpdateHistoryApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 40106;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return 'コンテナJOBの変更履歴の一覧';
    }

    /**
     * @see Api::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return parent::docRemarks();
    }

    /**
     * @see Api::docPriority()
     */
    public function docPriority(): Priority
    {
        return parent::docPriority();
    }

    /**
     * @see Api::docProgress()
     */
    public function docProgress(): Progress
    {
        return parent::docProgress();
    }

    /**
     * @see Api::docInCharge()
     */
    public function docInCharge(): Worker|null
    {
        return parent::docInCharge();
    }

    /**
     * @see Api::getApiCategory()
     */
    public function getApiCategory(): ApiCategory|null
    {
        return ApiCategory::Lp3Job;
    }

    /**
     * @see Api::getHttpRequestMethod()
     */
    public function getHttpRequestMethod(): HttpRequestMethod|null
    {
        return HttpRequestMethod::Get;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'job/cont/{id}/update-history';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        return false;
    }
}
