<?php

namespace App\Management\Apis\Lp3Cargo\CarModel;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Worker;

/**
 * 車種の削除API
 */
class CarModelDeleteApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 20405;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '車種の削除';
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
        return HttpRequestMethod::Delete;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'car-model/{id}';
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
