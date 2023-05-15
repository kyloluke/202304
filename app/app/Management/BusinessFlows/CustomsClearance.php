<?php

namespace App\Management\BusinessFlows;

/**
 * 通関手続き
 */
class CustomsClearance extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 6;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '通関手続き';
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
        //通関業者（乙仲）がLP3かSYNC OPスタッフから連絡を受けて通関手続きを行う。
        //LP3からは、作業確定後or書類のアップロード後に通関業者（乙仲）への通関手続きの連絡をする
        (new \App\Management\Functions\ContConfirmWork())->main();
        (new \App\Management\Functions\RoroConfirmWork())->main();

        //通関業者（乙仲）、船積元請け会社、シッパー、作業会社のいずれかが
        //通関の手続後、輸出許可書(ED)をLP3の船積JOB(コンテナ・RORO)にアップロードする。
        (new ContCreateCustomsDocuments())->main();
        (new RoroCreateCustomsDocuments())->main();

        return false;
    }
}
