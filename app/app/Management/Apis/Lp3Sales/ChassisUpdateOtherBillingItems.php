<?php

namespace App\Management\Apis\Lp3Sales;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;

/**
 * 車輌のその他請求明細の一括更新API
 */
class ChassisUpdateOtherBillingItems extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 50303;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '車輌のその他請求明細の一括更新';
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
        return HttpRequestMethod::Put;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'chassis/{id}/billing-item/bulk';
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
