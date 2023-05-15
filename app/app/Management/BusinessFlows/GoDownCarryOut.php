<?php

namespace App\Management\BusinessFlows;


/**
 * GoDown実施
 */
class GoDownCarryOut extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 12;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'GoDown実施';
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
        //ヤードスタッフがLP3から輸出許可書(ED)をダウンロードする。
        // @todo ROROJOBで輸出許可書(ED)のダウンロード機能を作成する。

        //ヤードスタッフが陸送会社に輸出許可書(ED)を手渡しする。

        //陸送会社が車両をRORO船の停泊している岸壁へ運搬する。

        //Godown日が過ぎるとLP3が車両のステータスを自動更新する。
        //LP3にGodown日が入力されているか
        $inputgodown = true;

        if($inputgodown){
            //Godwn日が入力されている場合

            //GoDown日が過ぎたら車輛のステータスがGoDown済になる
            // @todo GoDown日過ぎたら車両のステータスを「GoDown済」に変更する機能を作成する。
        }
        else{
        }

        //出港日過ぎたら車輛のステータスが輸出済になる
        // @todo 出港日過ぎたら車両のステータスを「輸出済」に変更する機能を作成する。

        return false;

    }
}
