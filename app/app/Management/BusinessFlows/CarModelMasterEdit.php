<?php

namespace App\Management\BusinessFlows;

/**
* 車種マスタ登録
*/
class CarModelMasterEdit extends BusinessFlow
{
	/**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 25;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '車種マスタ登録';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '入力補助で出てこなかった場合、登録する。';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNC OP(Silver以上)が車種の情報を登録・更新する。
        
        (new App\Management\Functions\Master\CarModelEdit())->main();
        
        return false;
    }
}