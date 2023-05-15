<?php

namespace App\Management\BusinessFlows;

/**
 * ドックレシートの作成
 */
class CreateDockReceipt extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 8;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ドックレシートの作成';
    }

	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'ドック・レシートはExcelファイルフォーマットにて作成';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {

        //乙仲がドック・レシート(Excelファイルフォーマット)を作成する。

        //乙仲がドック・レシートをLP3にアップロードする。
        (new \App\Management\Functions\ContainerDocUpdate())->main();

        // 乙仲がドック・レシートを船会社/コンテナターミナル運営会社にメールで送付する。

        //船会社/コンテナターミナル運営会社がドック・レシートをメール経由で受領する。

        return false;
    }
}
