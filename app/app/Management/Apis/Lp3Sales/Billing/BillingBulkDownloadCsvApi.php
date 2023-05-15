<?php

namespace App\Management\Apis\Lp3Sales\Billing;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Priority;
use App\Management\Enums\Worker;

/**
 * 複数請求のCSVのダウンロードAPI
 */
class BillingBulkDownloadCsvApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 50509;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '複数請求のCSVのダウンロード';
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
        return ApiCategory::Lp3Sales;
    }

    /**
     * @see Api::getHttpRequestMethod()
     */
    public function getHttpRequestMethod(): HttpRequestMethod|null
    {
        return HttpRequestMethod::Post;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'billing/bulk/csv/download';
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
