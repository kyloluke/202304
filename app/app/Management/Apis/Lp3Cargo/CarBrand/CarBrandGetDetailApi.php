<?php

namespace App\Management\Apis\Lp3Cargo\CarBrand;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Worker;

/**
 * 自動車ブランドの詳細の取得API
 */
class CarBrandGetDetailApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 20302;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '自動車ブランドの詳細の取得';
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
        return Worker::AvanteTsuruoka;
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
        return HttpRequestMethod::Get;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'car-brand/{id}';
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
