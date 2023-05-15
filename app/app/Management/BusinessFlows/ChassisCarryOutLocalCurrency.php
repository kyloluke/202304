<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ChassisRegisterCarryOut;
use App\Management\Functions\ChassisRequestLocalOut;

/**
 * 内貨搬出(永久)
 */
class ChassisCarryOutLocalCurrency extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 18;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '内貨搬出(永久)';
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
        //SHIPPERが陸送会社に陸送の依頼をする。

        //SHIPPERがSYNC OPEに内貨搬出依頼をする。(メールで連絡) 

        //SYNC OP：ヤードスタッフへ車輌の内貨搬出依頼をする
        // @todo 内貨搬出依頼の機能を作成する。内貨搬出依頼をすると車両のステータスが「内貨搬出予定」に変わる。
        (new ChassisRequestLocalOut())->main();

        //ヤードスタッフが内貨搬出予定の車両を玉出しする。

        //陸送会社が車両を搬出する。

        //ヤードスタッフ：車輌の内貨搬出登録をする
        // @todo 内貨搬出登録機能を作成する。車両のステータスが「内貨搬出予定」から「内貨搬出済」にステータスを変更する。
        (new ChassisRegisterCarryOut())->main();

        //ヤード搬入履歴の編集
        (new ChassisEditYardCarryInOutHistories)->main();

        return true;
    }
}
