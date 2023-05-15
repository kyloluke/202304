<?php

namespace App\Management\Apis;

use App\Management\Apis\Enums\ApiCategory;
use App\Management\Apis\Enums\HttpRequestMethod;
use App\Management\Apis\Enums\Progress;
use App\Management\Enums\Priority;
use App\Management\Enums\Worker;

/**
 * API
 *
 * 共通仕様など、置き場に困る場合は一旦このクラスに記述する
 */
abstract class Api
{
    //■ パスのルール
    //以下の形式にすることを基本的な方針とする。
    //(マイクロサービス名)/(ドメインモデル名)/...
    //
    //ドメインモデルに対応しない場合や、複数のAPIで実現していることを1つにまとめたAPIを作成する場合などは、以下の形式にする。
    //(マイクロサービス名)/hl/...
    //※ hl = High Level の略

    /**
     * ドキュメント用:ID
     */
    public function docId(): int|null
    {
        return null;
    }

    /**
     * ドキュメント用:名前
     *
     * @return string|null
     */
    public function docName(): string|null
    {
        return null;
    }

    /**
     * ドキュメント用:備考
     *
     * @return string|null
     */
    public function docRemarks(): string|null
    {
        return null;
    }

    /**
     * ドキュメント用:HTTPリクエストメソッド
     *
     * @return string
     */
    final public function docHttpRequestMethod(): string
    {
        return $this->getHttpRequestMethod()?->label() ?? '';
    }

    /**
     * ドキュメント用:パス
     *
     * @return string
     */
    final public function docPath(): string
    {
        return '/' . ($this->getApiCategory()?->label() ?? '@todo') . '/' . ($this->getPath() ?? '@todo');
    }

    /**
     * ドキュメント用:優先度
     *
     * @return Priority
     */
    public function docPriority(): Priority
    {
        return Priority::Low;
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
        return null;
    }

    /**
     * APIカテゴリを返す
     *
     * @return ApiCategory|null
     */
    public function getApiCategory(): ApiCategory|null
    {
        return null;
    }

    /**
     * HTTPリクエストメソッドを返す
     *
     * @return HttpRequestMethod|null
     */
    public function getHttpRequestMethod(): HttpRequestMethod|null
    {
        return null;
    }

    /**
     * パスを返す
     *
     * @return string
     */
    public function getPath(): string|null
    {
        return null;
    }
}
