<?php

namespace App\Management\BusinessFlows;

/**
* 本船マスタ登録
*/
class ShipMasterEdit extends BusinessFlow
{    
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 24;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '本船マスタ登録';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '本船スケジュールを作成する際に本船名を引用できない場合に登録';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNC OP(Silver以上)が本船名の情報を登録・更新する。
        (new app\Management\Functions\Master\ShipRegister())->main();
        
        return false;
    }
}