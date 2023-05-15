<?php

namespace App\Management\BusinessFlows;

/**
 * 船積確定(コンテナ)
 */
class ContShippingConfirmed extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 5;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '船積確定(コンテナ)';
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
        // SYNC OPスタッフが作業スケジュールの調整を行う
        (new JobScheduleAdjustment())->main();

        //SYNC OPスタッフがLP3で船積確定を行う
        //コンテナJOBの場合は作業会社・通関業者・蔵主・ドレー業者に連絡する
        (new \App\Management\Functions\ContConfirmWork())->main();

        return false;
    }
}
