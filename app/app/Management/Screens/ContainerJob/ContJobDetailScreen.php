<?php

namespace App\Management\Screens\ContainerJob;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * コンテナJOB詳細画面
 */
class ContJobDetailScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 32;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 408;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::ContainerJob;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'コンテナJOBの詳細画面';
    }

    /**
     * @see Screen::docScreenImageProgress()
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return ScreenImageProgress::Created;
    }

    /**
     * @see Screen::docScreenImageInCharge()
     */
    public function docScreenImageInCharge(): Worker|null
    {
        return Worker::AvanteSato;
    }

    /**
     * @see Screen::docBetaViewPriority()
     */
    public function docBetaViewPriority(): Priority
    {
        return Priority::High;
    }

    /**
     * @see Screen::docBetaViewPriority()
     */
    public function docBetaViewProgress(): BetaViewProgress|null
    {
        return BetaViewProgress::Created;
    }

    /**
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteFujisaki;
    }

    /**
     * JOB詳細画面のタブ
     */
    public function contJobDetailTab()
    {
        //以下のタブを作成する
        //・アクティビティ
        //・船積車輛
        //・書類
        //・コンテナ写真
        //・フレイト
        //・コメント
    }

    /**
     * JOB詳細画面のアクションボタン
     */
    public function contJobDetailActionButton()
    {
        //ダイアログを開くアクションボタン
        //・船積確定 -> 船積み確定後は、確定した作業を「解除」する昨日のボタンに変更する
        //・請求情報

        //タブに移動するアクションボタン。ナビゲーションとして使用する。
        //・船積車輛
        //・書類
        //・コンテナ写真
        //・フレイト
        //・コメント
    }

    /**
     * 複数SHIPPERの対応
     */
    public function multipleShipper()
    {
        //複数SHIPPERの場合、「船積車輛」「書類」「フレイト」はSHIPPERごとにタブを分ける
        //詳細画面の左カラムでもSHIPPERごとの情報をタブ分けして表示するため、左カラムと中央カラムのSHIPPER選択タブは連動させる
    }

    /**
     * フレイト登録
     */
    public function contJobFreightEdit()
    {
        //複数SHIPPERがいる場合、SHIPPERごとに別の内容を登録することがありえるため、SHIPPERごとにタブを分ける
        //フレイトの登録時、事前に見積もりが作成されていることを必須とする。
        //見積もりが作成されていない場合は、見積作成画面に飛べるようにする。その際、SHIPPERとサービス基本情報が見積作成画面に反映されているなど容易に作成を始められるようにする
        //フレイト登録の画面では値段の変更・課税区分の変更はできないようにする。減額する場合は値段をオープン価格に設定したディスカウント用のサービスを追加して、値引く金額を入力する
    }

    /**
     * コンテナ写真
     */
    public function contJobPhoto()
    {
        //写真は登録時に選択した写真種別「VANNING」「DEVANNING」どちらかのタブに表示。「すべて」タブはなくてOK。
        //写真の種類は「写真を追加」ボタンを押したときのタブの種類がデフォルト選択。
        //写真の種類を一括で設定できる機能を追加。
    }

    /**
     * 輸出キャンセル時のJOBの扱い
     */
    public function jobCancel()
    {
        //輸出が完全にキャンセルになったが請求が発生している場合など、キャンセルステータスが必要と考えられるが、対応は一旦保留
        //上記の事案が発生した場合、スポット請求で対応する
    }

    /**
     * アクティビティの表示
     */
    public function viewActivity()
    {
        //画面イメージ：https://xd.adobe.com/view/4cbb3daf-7c77-4424-a201-a69f13f7d5e0-19e8/screen/45b7744e-447f-44a0-be81-d4add0b09d1f/
        //更新者の検索時はそのSTOCKを更新したユーザーのみ選択肢に出す
        //アクティビティの並び順は日付で昇順にする
    }

    /**
     * 変更履歴の表示
     */
    public function viewChangeHistory()
    {
        //viewActivityの詳細確認からアクセスする
        //画面イメージ：https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/screen/6e1b0c07-0612-4784-ba3c-96144e93c411/
    }

    /**
     * コメント
     */
    public function comment()
    {
        //画面イメージ：https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/screen/a64f3c7b-23f9-40c4-8987-22a002d77103/
        //宛先の選択は個人宛のみ。担当者がわからないので会社宛にする、といった機能は通知が増える可能性もあるため考慮しない
        //スレッドの並び順は、スレッドに投稿されたコメントのうち最も新しい投稿の日付で降順にする
        //スレッド内のコメントの並び順は、日付で昇順にする
    }
}
