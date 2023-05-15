<?php

namespace App\Management\BusinessFlows;

/**
* ユーザー検索
*/
class UserSearch extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 40;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザー検索(ユーザーマスタ)';
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
        //SYNC・事業所ユーザー、が検索したいユーザー名(キーワード)を入力しユーザーを検索する。

        //LP3が結果を表示する。
        (new \App\Management\Functions\Master\UserSearch())->main();

        return false;
    }
}