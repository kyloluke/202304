<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ChassisRequestTransferWithinYardGroup;
use App\Management\Models\YardGroup;

/**
 * 車輌のヤードグループ内の移動
 *
 * ヤードグループ内の車輌の移動のこと
 * ヤードグループ間での移動は内貨搬出依頼でやることになる
 * aka.車輛ヤードグループ間移動(ヤード間)
 */
class ChassisTransferWithinYardGroup extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 45;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '車輌ヤードグループ間移動';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'ヤードグループ間の車輛の移動';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        $yardGroup = new YardGroup();

        //SYNC OPが「車輌のヤードグループ間移動依頼」の機能を使って、搬出元のヤードスタッフ、搬入先のヤードスタッフに車輌の移動を依頼する
        (new ChassisRequestTransferWithinYardGroup())->main();

        //搬出元のヤードスタッフの搬出登録、搬入先のヤードスタッフの搬入登録、のいずれかが完了したらヤードグループ内の移動が完了したことにする
        //参考:2023/02/14 SYNC大淵さんとの打ち合わせ https://sync-logi.backlog.com/alias/wiki/2451536
        // @todo 搬出登録の機能
        // @todo 搬入登録の機能

        return true;
    }
}
