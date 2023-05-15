<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ChassisRegisterPhoto;
use App\Management\Models\ChassisPhotoType;

/**
 * 軽作業
 */
class EasyWork extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 20;
    }

	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '軽作業';
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
        //SHIPPERがSYNC OPへ軽作業の依頼をする。(メールで連絡)

        //SYNC OPがヤードスタッフへ作業指示の連絡をする。(メールまたはスプレッドシートで連絡)

        //ヤードスタッフが軽作業(車両への貨物積込、パーツ交換など)を行う。

        //軽作業完了後、ヤードスタッフがSYNC OPへ作業完了報告をする。(メールまたはスプレッドシートで連絡)

        //車両写真の種類：軽作業
        ChassisPhotoType::EasyWork;

        //作業実績の証明のために必要な場合は、ヤードスタッフが車輌の写真のアップロードをする
        //画像のアップロード機能を作成する。
        (new ChassisRegisterPhoto())->main();

        //SYNC OPがSHIPPERに作業の完了報告を行う。(メールで写真も添付して連絡)

        return true;
    }
}
