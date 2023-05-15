<?php

namespace App\Management\BusinessFlows;

/**
* WEB共有画面
*/
class WebShareScreen extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 48;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'WEB共有画面';
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
        //SYNC OPが共有ボタンを押す
        // @todo 共有URLを発行するための設定画面表示機能を作成する。

        //SYNC OPが閲覧期限日数を設定する。(デフォルト5日)

        //SYNC OPがパスワードを設定する。(設定しない場合は自動生成)

        //SYNC OPがリンク発行ボタン(仮)を押す
        
        //LP3で共有リンクとパスワードを発行する。
        // @todo 共有リンク・パスワード発行機能を作成する。

        //SYNC OPが共有リンク・パスワードのコピーボタンを押して情報をコピーする。
        // @todo 共有リンク・パスワードのコピー機能を作成する。

        //SYNC OPがメールやslack等のメッセージングアプリに貼り付けてWEB共有画面閲覧ユーザーに送付する。

        //WEB共有画面閲覧ユーザーが送られてきたリンクをクリック

        //WEB共有画面閲覧ユーザーが連絡を受けたパスワードを入力する。
        //LP3で共有画面を表示する。
        // @todo WEB共有画面表示機能を作成する。
        
        //WEB共有画面閲覧ユーザーが写真を閲覧する。
        // @todo 写真のweb共有閲覧画面を表示する機能を作成する。
        // @todo 写真のダウンロード機能を作成する ※優先度：低

        //WEB共有画面閲覧ユーザーが書類を閲覧する。
        //プレビュー画面・ダウンロード（確定）
        // @todo 書類のweb共有閲覧画面を表示する機能を作成する。

        return false;
    }
}