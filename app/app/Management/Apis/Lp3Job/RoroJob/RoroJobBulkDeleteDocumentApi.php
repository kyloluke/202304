<?php

namespace App\Management\Apis\Lp3Job\RoroJob;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Priority;
use App\Management\Enums\Worker;

/**
 * ROROJOBの書類の一括削除API
 */
class RoroJobBulkDeleteDocumentApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 40213;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return 'ROROJOBの書類の一括削除';
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
        return HttpRequestMethod::Delete;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'job/roro/{id}/document/bulk';
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
