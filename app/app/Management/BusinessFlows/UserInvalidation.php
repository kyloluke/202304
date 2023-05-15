<?php

namespace App\Management\BusinessFlows;

/**
* ユーザー無効化
*/
class UserInvalidation extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 36;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザー無効化';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'ユーザー有効化のフローも同じフローになる';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNC OPまたは事業所管理者ユーザーが対象となるユーザーを無効化する。
        (new \App\Management\Functions\Master\UserInvalidation())->main();
        
        return false;
    }
}