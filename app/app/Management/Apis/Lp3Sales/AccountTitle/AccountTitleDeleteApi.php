<?php

namespace App\Management\Apis\Lp3Sales\AccountTitle;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Worker;

/**
 * 勘定科目の削除API
 */
class AccountTitleDeleteApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 50605;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return '勘定科目の削除';
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
        return HttpRequestMethod::Delete;
    }

    /**
     * @see Api::getPath()
     */
    public function getPath(): string|null
    {
        return 'account-title/{id}';
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
