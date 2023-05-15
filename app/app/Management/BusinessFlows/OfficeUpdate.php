<?php

namespace App\Management\BusinessFlows;

/**
 * 事業所情報更新
 */
class OfficeUpdate extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 47;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '事業所情報更新';
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
        //SYNCユーザーおよび事業所管理者ユーザーが事業所の情報を更新する。
        (new app\Management\Functions\Master\OfficeUpdating())->main();

        return false;
    }
}
