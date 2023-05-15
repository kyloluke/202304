<?php

namespace App\Management\Models;

/**
 * コンテナ船スケジュール明細
 */
class ContShipScheduleItem
{
    /**
     * ドキュメントCUT日時(=ドキュメントCUT日)
     *
     * ※LP3で新規追加
     * 書類種別:DR(=ドックレシート)のドキュメントのCUT日
     * 手入力で日(JST)を指定することになる予定
     */
    public $documentCutAt;

    /**
     * ドキュメントCUTのAMフラグ
     *
     * ※LP3で新規追加
     */
    public bool $documentAmCut;

    /**
     * CY CUT日時(=CY CUT日)
     *
     * コンテナヤード(=CY)のCUT日
     * LP2のDBでは「CUT日(cut_at)」として扱っている
     */
    public $cyCutAt;

    /**
     * CY CUTのAMフラグ
     */
    public $cyAmCut;
}
