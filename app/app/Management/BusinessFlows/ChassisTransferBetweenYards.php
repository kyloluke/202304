<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ChassisRegisterCarryIn;
use App\Management\Functions\ChassisRegisterCarryOut;
use App\Management\Functions\ChassisRequestLocalOut;

/**
 * 内貨搬出(ヤード間)
 */
class ChassisTransferBetweenYards extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 19;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '内貨搬出(ヤード間)';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'SYNC間ヤードの移動(船積経由せず)';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNC OPが陸送会社に陸送の依頼をする。

        //SYNC OP：ヤードスタッフへ車輌の内貨搬出依頼をする
        // @todo 内貨搬出依頼の機能を作成する。内貨搬出依頼をすると車両のステータスが「内貨搬出予定」に変わる。
        (new ChassisRequestLocalOut())->main();

        //搬出元のヤードスタッフが内貨搬出予定の車両を玉出しする。

        //陸送会社が車両を搬出する。

        //搬出元のヤードスタッフ：車輌の内貨搬出登録をする
        // @todo 内貨搬出登録機能を作成する。車両のステータスが「内貨搬出予定」から「内貨搬出済」にステータスを変更する。
        (new ChassisRegisterCarryOut())->main();

        //搬入先のヤードスタッフ：車両の搬入登録をする
        // @todo 搬入登録機能を作成する。車両のステータスを「搬入済」に変更する。
        (new ChassisRegisterCarryIn())->main();

        //ヤード搬入履歴の編集
        (new ChassisEditYardCarryInOutHistories)->main();

        return true;
    }
}
