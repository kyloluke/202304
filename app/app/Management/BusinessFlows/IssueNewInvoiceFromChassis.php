<?php

namespace App\Management\BusinessFlows;

/**
 * 車輌から請求書を新規発行する
 */
class IssueNewInvoiceFromChassis extends BusinessFlow
{
    //LP3要件・要望
    //車輌から請求書を新規発行できるようにする。

    //備考
    //No44

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return null;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '車輌から請求書を新規発行';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'ワークフロー未作成';
    }
    
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // @TBC 業務フローの確認

        return false;
    }
}
