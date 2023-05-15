<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ContJobChangeWorkSchedule;
use App\Management\Functions\ContJobViewWorkScheduleList;

/**
 * 作業スケジュール調整
 */
class JobScheduleAdjustment extends BusinessFlow
{
    
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 44;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '作業スケジュール調整';
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
        // @todo アクター:SYNC OP、JOBデータ確認

        // ヤードが保税ヤードか?
        $result = true;

        // 保税ヤードの場合
        if ($result) {
            // @todo アクター:SYNC OP、通関書類の確認
        }

        // @todo アクター:SYNC OP、車輌の情報確認

        //アクター:SYNC OP
        //コンテナJOBの作業順を組み立てる
        //以下の機能を利用する
        //・コンテナJOBの作業スケジュール一覧の表示
        (new ContJobViewWorkScheduleList())->main();
        //・コンテナJOBの作業スケジュールの変更
        (new ContJobChangeWorkSchedule())->main();

        // @todo アクター:SYNC OP、スケジュール確定
        // @TBC ↓のシステム的なサポートをする必要があるか、要確認
        // 保税ヤードの場合は「通関書類の確認」の業務がある。これをシステム的にサポートする場合は、作業確定時に「通関書類がアップロードされていない場合はNGにする」という判定をすれば良い。
        // システム的なサポートをする必要がある場合は、「ヤード」に「保税ヤード or CY(=コンテナヤード)」のプロパティが必要になる

        return false;
    }
}
