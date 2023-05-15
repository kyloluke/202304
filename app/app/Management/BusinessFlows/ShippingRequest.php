<?php

namespace App\Management\BusinessFlows;

/**
 * 船積依頼
 */
class ShippingRequest extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 3;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '船積依頼';
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
        //荷主が輸出希望する意思表示を　SYNC OPスタッフに連絡する。

        //SYNC OPスタッフが、依頼を受けた時点で確定している情報をLP3の船積みJOB(コンテナ・RORO)に登録する。
        // コンテナJOB
        (new \App\Management\Functions\ContJobRegister())->main();
        // ROROJOB
        (new \App\Management\Functions\RoroJobRegister())->main();

        //荷主がBOOKINGの手配済みかどうか
        $booking = true;

        //荷主がBOOKINGの手配済みの場合
        if ($booking) {
            //荷主がBookingカンファメーションをSYNC OPにメールで送付する
        } else {
            //SYNC OPスタッフがBOOKINGの手配をする
        }

        //SYNC　OPスタッフがスケジュールの調整をする(通関手続きと作業時間を考慮)

        //SYNC OPスタッフが船のスケジュールやBOOKINGの情報をLP3に追加登録する
        //コンテナJOB、ROROJOBの船のスケジュール
        (new \App\Management\Functions\ContJobShipInfoRegister())->main();
        (new \App\Management\Functions\RoroJobShipInfoRegister())->main();
        //コンテナJOB、ROROJOBのBooking情報の登録
        (new \App\Management\Functions\ContJobBookingRegister())->main();
        (new \App\Management\Functions\RoroJobBookingRegister())->main();

        //SYNC OPスタッフが貨物情報や、バンニングプランを確定する

        //SYNC OPスタッフが船積予定車両の情報をLP3に登録する。
        // コンテナ
        (new \App\Management\Functions\ContJobVanningVehicleRegister())->main();
        // RORO
        (new \App\Management\Functions\RoroJobShippingVehicleRegister())->main();

        return false;
    }
}
