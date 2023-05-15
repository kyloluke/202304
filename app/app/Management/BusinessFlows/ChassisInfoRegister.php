<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ChassisEdit;
use App\Management\Functions\ChassisRegisterPhoto;
use App\Management\Functions\ChassisRegister;

/**
 * 車輌情報登録
 */
class ChassisInfoRegister extends BusinessFlow
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 2;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '車輌情報登録';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '移送されてきた車輛の受付からLP登録まで';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //ヤードスタッフが、業者（車両を持ち込んできた人)から渡される引渡書を確認し、受領サインをして引渡書の一部を業者に返す。

        //ヤードスタッフが、車両を受け取った時点の状態を記録するために写真を撮影

        //ヤードスタッフが、受け取った車両を保管場所に移動する。

        //ヤードスタッフが、車両の情報をLP3に登録する
        // LP3に登録されていない車輌の場合
        if (true) {
            (new ChassisRegister())->main();//引渡書に記載されている情報を基に登録する
        } // LP3に登録されている車輌の場合
        else {
            (new ChassisEdit())->main();
        }
        // 車輌の車輌写真の登録
        (new ChassisRegisterPhoto())->main();

        return true;
    }
}
