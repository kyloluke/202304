<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ChassisEndTempOut;
use App\Management\Functions\ChassisRequestTempOut;
use App\Management\Functions\ChassisStartTempOut;

/**
 * 一時搬出
 */
class TempOut extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 16;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '一時搬出';
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
        //SYNC OPまたはSHIPPERが陸送会社へ陸送依頼を行う。

        //陸送会社が依頼を受領する。

        //SHIPPERが依頼したか
        $shipper = true;

        if($shipper){
            //SHIPPERが依頼した場合
            //SHIPPERからSYNC OPに対して、搬出スケジュールの共有をしてもらう。
        }
        else{

        }

        //SYNC OPがヤードスタッフへ車輛搬出の連絡をする。
        //SYNC OPが車輌の一時搬出依頼をする
        // @todo 一時搬出依頼の機能を作成する。このとき、一時搬出の理由を記載できるようにする
        (new ChassisRequestTempOut())->main();

        //ヤードスタッフが一時搬出予定の車両を玉出しする。

        //ヤードスタッフが車輌の一時搬出の開始登録をする
        // @todo 一時搬出登録機能を作成する。
        (new ChassisStartTempOut())->main();

        //陸送会社が車両を搬出する。

        //搬出されていた車両が陸送会社によって再搬入される。

        //ヤードスタッフが車輌の一時搬出の終了登録をする
        // @todo 一時搬出の終了登録機能を作成する。
        (new ChassisEndTempOut())->main();

        return true;
    }
}
