<?php

namespace App\Management\BusinessFlows;


/**
 * シッピングオーダー作成
 */
class CreateShippingOrder extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 10;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'シッピングオーダー作成';
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
        //乙仲がシッピングオーダー(SO)を作成する。

        //乙仲がLP3にシッピングオーダーをアップロードする。
        (new \App\Management\Functions\RoroDocUpdate())->main();

        return false;
    }
}
