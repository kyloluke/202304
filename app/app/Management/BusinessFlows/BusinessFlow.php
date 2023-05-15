<?php

namespace App\Management\BusinessFlows;

/**
 * 業務フロー図
 *
 * 共通仕様など、置き場に困る場合は一旦このクラスに記述する
 */
abstract class BusinessFlow
{
    /**
     * ドキュメント用:ID
     * @return int|null
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

}
