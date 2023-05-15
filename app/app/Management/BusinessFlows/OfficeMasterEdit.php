<?php

namespace App\Management\BusinessFlows;

/**
* 事業所登録・更新
*/
class OfficeMasterEdit extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 29;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '事業所登録・更新';
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
        //スタートが新規事業所との取引が始まった場合。

        //SYNC OPが新規の事業所をマスタに登録。
        (new \App\Management\Functions\Master\OfficeRegister())->main();

        //SYNC OPが事業所のGold(管理者)ユーザーをユーザーマスタに登録。
        (new UserMasterRegister())->main();

        // 事業所のGold(管理者)が同事業社内のBronze(一般)ユーザーをユーザーマスタに登録。
        (new UserMasterRegister())->main();

        return false;
    }
}
