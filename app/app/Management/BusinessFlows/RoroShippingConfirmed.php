<?php

namespace App\Management\BusinessFlows;

/**
 * 船積確定(RORO)
 */
class RoroShippingConfirmed extends BusinessFlow
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
        return '船積確定(RORO)';
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
        //SYNC OPスタッフがLP3で船積確定を行う
        //ROROJOBの場合は通関業者・蔵主に連絡する
        (new \App\Management\Functions\RoroConfirmWork())->main();

        return false;
    }
}
