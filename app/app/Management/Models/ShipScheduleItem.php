<?php

namespace App\Management\Models;

/**
 * 本船スケジュール明細
 *
 * 積地or揚地の到着予定日時には、物理的に船が港に到着する予定の日時を設定している
 */
class ShipScheduleItem
{
    /**
     * 積地の到着予定日時
     */
    public $polArriveAt;

    /**
     * 揚地の到着予定日時
     */
    public $podArriveAt;
}
