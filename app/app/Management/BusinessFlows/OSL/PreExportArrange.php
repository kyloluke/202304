<?php

namespace App\Management\BusinessFlows\OSL;

use App\Management\BusinessFlows\BusinessFlow;

/**
 * 輸出前調整
 */
class PreExportArrange extends BusinessFlow
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
        return '輸出前調整';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'OSL業務として、チャットツールなどを使用した輸出前調整';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //依頼元が船積み可否調整を行う
        //シェアCON許可の確認や費用調整、船積み許可までのやり取り

        //SYNC OP(OSL)が本船スケジュールの調整を行う。
        //VANNING PLANの調整、回答。本船スケジュールの調整とCONTRACT 確認。

        //SYNC OP(OSL)が担当するヤードの作業スケジュールを管理する。
        // @todo 作業スケジュール調整機能を作成する。

        return false;
    }
}
