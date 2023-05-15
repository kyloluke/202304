<?php

namespace App\Management\BusinessFlows;

/**
* 一括更新(ユーザーマスタ)
*/
class UserMasterBulkUpdate extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 41;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '一括更新(ユーザーマスタ)';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '一括更新の項目は事業所とステータス(LP2と同じ設定項目)';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNCユーザー・事業所管理者ユーザーが更新対象となるユーザーの検索をする。
        (new UserSearch())->main();

        //検索結果から、SYNCユーザー・事業所管理者ユーザーが更新したいユーザーを複数選択し、更新ボタンを押下する。
        //SYNCユーザー・事業所管理者ユーザーが一括更新画面で更新したい項目を設定して一括更新する。
        (new \App\Management\Functions\Master\UserBulkUpdate())->main();

        return false;
    }
}