<?php

namespace App\Management\BusinessFlows;

/**
 * 事業所無効化
 */
class OfficeInvalidation extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 46;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '事業所無効化';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '事業所有効化のフローも同じフローになる。';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNC管理者ユーザーが事業所を無効化する。
        (new app\Management\Functions\Master\OfficeInvalidness())->main();

        return false;
    }
}
