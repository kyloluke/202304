<?php

namespace App\Management\Apis\Lp3Sales\ProductScheme;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Priority;
use App\Management\Enums\Worker;

/**
 * 商品スキームの作成API
 */
class ProductSchemeCreateApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 50003;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '商品スキームの作成';
    }

    /**
     * ドキュメント用:優先度
     *
     * @return Priority
     */
    public function docPriority(): Priority
    {
        return Priority::High;
    }

    /**
     * ドキュメント用:進捗
     *
     * @return Worker|null
     */
    public function docProgress(): Progress
    {
        return Progress::NotCreated;
    }

    /**
     * ドキュメント用:担当者
     *
     * @return Worker|null
     */
    public function docInCharge(): Worker|null
    {
        return Worker::CreerKawano;
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
        return 'product-scheme';
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
