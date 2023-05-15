<?php

namespace App\Management\Apis\Lp3Core;

use App\Management\Apis\Api;
use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Priority;
use App\Management\Enums\Worker;

/**
 * ログインAPI
 */
class LoginApi extends Api
{
    /**
     * @see Api::docId()
     */
    public function docId(): int|null
    {
        return 10001;
    }

    /**
     * @see Api::docName()
     */
    public function docName(): string|null
    {
        return 'ログイン';
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
        return ApiCategory::Lp3Core;
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
        return 'login';
    }

    /**
     * main
     *
     * @return true
     */
    public function main(): bool
    {
        // ユーザーの認証をする

        // 認証に成功し、ユーザーに二要素認証が設定されている場合は、ユーザーのメールアドレス宛に二要素認証用確認コードのメールを送信する

        // 連続10回ログインに失敗した場合は1時間のアカウントロックがかかるようにする
        // @todo 適切な場所に移動する アカウントロックはユーザーが所属する事業所の管理者であれば手動でも解除できるようにする

        return false;
    }
}
