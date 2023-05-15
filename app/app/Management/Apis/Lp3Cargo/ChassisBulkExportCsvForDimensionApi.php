<?php

namespace App\Management\Apis\Lp3Cargo;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;

/**
 * 複数車輌の寸法用CSVのエクスポートAPI
 */
class ChassisBulkExportCsvForDimensionApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 20014;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '複数車輌の寸法用CSVのエクスポート';
    }

    /**
     * @see Api::getApiCategory()
     */
    public function getApiCategory(): ApiCategory|null
    {
        return ApiCategory::Lp3Cargo;
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
        return 'chassis/bulk/csv-for-dimension/export';
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
