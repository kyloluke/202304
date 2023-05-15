<?php

namespace App\Management\Apis\Lp3Ship\ShipCompany;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Priority;
use App\Management\Enums\Worker;

/**
 * 船会社の更新API
 */
class ShipCompanyUpdateApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 30204;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '船会社の更新';
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
        return Progress::Created;
    }

    /**
     * @see Api::docInCharge()
     */
    public function docInCharge(): Worker|null
    {
        return Worker::AvanteLu;
    }

    /**
     * @see Api::getApiCategory()
     */
    public function getApiCategory(): ApiCategory|null
    {
        return ApiCategory::Lp3Ship;
    }

    /**
     * @see Api::getHttpRequestMethod()
     */
    public function getHttpRequestMethod(): HttpRequestMethod|null
    {
        return HttpRequestMethod::Put;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'ship-company/{id}';
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
