<?php

namespace App\Management\BusinessFlows;


/**
 * シッピングマークの貼付
 */
class PutShippingMark extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 9;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'シッピングマークの貼付け';
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
        //ヤードスタッフが輸出予定の車両を玉出し(作業できる場所まで移動)する。

        //荷主からの指定フォーマットがあるか？
        $shipperformat = true;

        if($shipperformat){
            //荷主からの指定フォーマットがある場合
            //SYNC OPまたは乙仲がシッピングマークを作成する。
        }
        else{
            //荷主からの指定フォーマットが無い場合
            //ヤードスタッフがLP3からシッピングマークの発行を行う。
            (new \App\Management\Functions\DownloadShippingMark())->main();
        }

        //ヤードスタッフまたは乙仲がシッピングマークを車両に貼り付ける。

        return false;
    }

    //業務フローの定義の際に、以下のような話が挙がったが、最終的にやらない、ということになった
    //
    //検討事項
    //シッピングマークについてどこが担当するのかステータスを保持するか検討
    //Ex:ヤードマスタで、シッピングマークが必要だとチェックを入れるとシッピングマークは必要書類であると表現（通知）できれば良い。
    //https://sync-logi.backlog.com/alias/wiki/2118745
}
