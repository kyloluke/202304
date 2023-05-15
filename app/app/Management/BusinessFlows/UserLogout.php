<?php

namespace App\Management\BusinessFlows;

/**
* ログアウト
*/
class UserLogout extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 43;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザーログアウト';
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
        //全ユーザーがログアウトを行う。
        // @todo ログアウト機能を作成する。
        
        return false;
    }
}