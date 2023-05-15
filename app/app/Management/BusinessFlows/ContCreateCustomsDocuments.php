<?php

namespace App\Management\BusinessFlows;

/**
 * 通関書類の作成(コンテナ)
 */
class ContCreateCustomsDocuments extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 4;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '通関書類の作成(コンテナ)';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // SYNC OP、船積元請け会社、シッパー、作業会社、通関業者のいずれかが通関書類（IV / EC / SI）を作成する

        // SYNC OP、船積元請け会社、シッパー、作業会社、通関業者のいずれかが作成した通関書類のアップロードをする
        (new \App\Management\Functions\DocumentUpdate())->main();

        return false;
    }
}
