<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ContShipScheduleCreate;
use App\Management\Functions\ContShipScheduleSearch;
use App\Management\Functions\ContShipScheduleUpdate;
use App\Management\Functions\RoroShipScheduleCreate;
use App\Management\Functions\RoroShipScheduleSearch;
use App\Management\Functions\RoroShipScheduleUpdate;

/**
 * 本船スケジュール登録
 */
class ShipScheduleRegister extends BusinessFlow
{   
    /**
    * @see Screen::docId()
    */
   public function docId(): int|null
   {
       return 31;
   }
   
   /**
    * @see Screen::docName()
    */
   public function docName(): string|null
   {
       return '本船スケジュール登録';
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
        //アクター「SYNC OP」：本船スケジュールの検索
        //・コンテナ船スケジュールの検索
        //・RORO船スケジュールの検索
        (new ContShipScheduleSearch())->main();
        (new RoroShipScheduleSearch())->main();

        //希望する本船スケジュールがヒットした？
        $result = true;

        //希望する本船スケジュールがヒットした場合は、そのまま終了
        if ($result) {
        } //希望する本船スケジュールがヒットしなかった場合は、本船スケジュールの作成or編集をする
        else {
            //・コンテナ船スケジュールの作成更新
            //・コンテナ船スケジュールの更新
            //・RORO船スケジュールの作成
            //・RORO船スケジュールの更新
            (new ContShipScheduleCreate())->main();
            (new ContShipScheduleUpdate())->main();
            (new RoroShipScheduleCreate())->main();
            (new RoroShipScheduleUpdate())->main();
        }

        return true;
    }
}
