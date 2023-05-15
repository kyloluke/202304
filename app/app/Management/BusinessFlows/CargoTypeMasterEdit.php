<?php

namespace App\Management\BusinessFlows;

/**
* 貨物種類マスタ登録
*/
class CargoTypeMasterEdit extends BusinessFlow
{
	/**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 23;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '貨物種類マスタ登録';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'コンテナの貨物種類に表示する選択肢として使用される。';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNC OP(Silver以上)が貨物種類の情報を登録・更新する。
       (new \App\Management\Functions\Master\CargoTypeEdit())->main();
        
        return false;
    }
}