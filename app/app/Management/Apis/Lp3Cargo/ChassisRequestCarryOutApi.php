<?php

namespace App\Management\Apis\Lp3Cargo;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;

/**
 * 車輌の搬出依頼API
 */
class ChassisRequestCarryOutApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 20032;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '車輌の搬出依頼';
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
        return 'chassis/{id}/carry-out-request';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // 内貨搬出の場合は搬出元のヤードスタッフに通知する
        // ヤード間移動の場合は搬出元のヤードスタッフと搬入先のヤードスタッフに通知をする
        return false;
    }
}
