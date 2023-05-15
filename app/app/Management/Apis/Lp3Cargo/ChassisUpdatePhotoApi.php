<?php

namespace App\Management\Apis\Lp3Cargo;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;

/**
 * 車輌の写真の更新API
 */
class ChassisUpdatePhotoApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 20053;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '車輌の写真の更新';
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
        return HttpRequestMethod::Put;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'chassis/{id}/photo/{id}';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // 写真の回転状態を保存する

        return false;
    }
}
