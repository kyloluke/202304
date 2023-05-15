<?php

namespace App\Management\Models;

/**
 * RORO船スケジュール明細
 */
class RoroShipScheduleItem
{
    /**
     * ドキュメントCUT日時(=ドキュメントCUT日)
     *
     * 書類種別:SOのドキュメントのCUT日
     * 手入力で日(JST)を指定することになる予定
     * LP2のDBでは「CUT日(cut_at)」として扱っている
     */
    public $documentCutAt;

    /**
     * GO DOWN日時
     */
    public $goDownAt;

    /**
     * GO DOWN場所
     *
     * 住所の情報を格納する
     */
    public $goDownDestination;
}
