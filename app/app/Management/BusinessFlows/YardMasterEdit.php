<?php

namespace App\Management\BusinessFlows;

/**
* マスタ登録(ヤード・ヤードグループ)
*/
class YardMasterEdit extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 30;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'マスタ登録(ヤード・ヤードグループ)';
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
        //SYNC OPまたはヤード運営スタッフがヤードグループの情報を登録・編集する。
        //　@todo ヤードグループ情報登録・編集機能を作成する

        //SYNC OPまたはヤード運営スタッフがヤードの情報を登録・編集する。
        //　@todo ヤード情報登録・編集機能を作成する。
        return false;
    }
}