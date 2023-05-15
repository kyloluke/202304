<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ChassisRegisterPreExportInspectionResult;

/**
 * 輸出前検査
 */
class PreExportInspection extends BusinessFlow
{ 
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 17;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '輸出前検査';
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
        //SYNC OPが車輛に対して実施する予定の輸出前検査を登録する
        // @todo 「実施する予定の輸出前検査を登録する」機能を作成する

        //SYNC OPが検査員に連絡し、実施予定日を決めてもらう
        // @todo 「検査の申込日を入力する」機能を作成する
        // @todo 「検査の実施予定日を入力する」機能を作成する

        //ヤードスタッフに輸出前検査実施の連絡をする
        //検査の実施予定日を入力した際に自動的に通知する
        //検査をヤード内でやるか検査場でやるかは管理する必要はなく、どちらの場合でもヤードスタッフへの連絡はテンプレート1種でOK。
        // @todo 「ヤードスタッフにメールで連絡する」機能を作成する

        //検査をヤード内でやる/やらない
        $inYard = true;

        if ($inYard) {
            //検査をヤード内でやる場合は特に何もしない
        } else {
            //検査をヤード内でやらない場合は一時搬出をし、一時搬出先で検査を実施する
            (new TempOut())->main();
        }

        //検査員が検査を実施する。SYNC OPが検査実施日を入力する
        // @todo 「検査実施日を入力する」機能を作成する
        // @todo ↑は輸出前検査結果の登録機能の中に入れる

        //SYNC OPが車輌の輸出前検査結果を登録する
        (new ChassisRegisterPreExportInspectionResult())->main();

        //検査結果
        $success = true;

        if ($success) {
            //検査合格証をアップロードする
            // @todo 「書類をアップロードする」機能を作成する
            // @todo ↑は輸出前検査結果の登録機能の中に入れる
        }
        return true;
    }
}
