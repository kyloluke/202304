<?php

namespace App\Management\Screens\Chassis;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車輌詳細画面
 */
class ChassisDetailScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 211;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Chassis;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '車輌の詳細';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return <<<END
CLABEL様に作成して頂いた画面イメージに要素を追加する必要あり。

■ β版で優先度の高い機能
・写真の表示
END;
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
        return Worker::AvanteHara;
    }

    /**
     * @see Screen::docBetaFeaturePriority()
     */
    public function docBetaFeaturePriority(): Priority
    {
        return Priority::High;
    }

    public function viewYardCarryInOutHistory()
    {
        //通常モードの場合はカスタムラベルの編集は不要
        //OSLモードの場合はカスタムラベルの編集が必要
    }

    /**
     * 車輛詳細画面のタブ
     */
    public function chassisDetailTab()
    {
        //以下のタブを作成する
        //・アクティビティ
        //・写真
        //・書類
        //・輸出前検査
        //・YARD搬入・搬出
        //・請求情報
        //・コメント
    }

    /**
     * 車輛詳細画面のアクションボタン
     */
    public function chassisDetailActionButton()
    {
        //ダイアログを開くアクションボタン
        //・船積み登録 -> 船積み登録後は、登録したJOBへのリンクに変更。

        //タブに移動するアクションボタン。ナビゲーションとして使用する。
        //・写真
        //・書類
        //・輸出前検査
        //・YARD搬入・搬出
        //・請求情報
        //・コメント
    }

    /**
     * 写真の表示
     */
    public function viewPhoto()
    {

    }

    /**
     * アクティビティの表示
     */
    public function viewActivity()
    {
        //システムのメッセージや別のユーザーが発信したメッセージは左寄り、自分が発信したメッセージは右寄りでタイムライン表示し、自分が発信したメッセージを一目で見分けられるようにして欲しい。という要望がある。
        //LINEのようなイメージ
        //コンテナJOBやROROJOBのアクティビティ、ユーザー間とのコメント機能についても同様のデザインを統一した方が良い
        //画面イメージ：https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/screen/9f9c79ed-4dcb-4477-8df1-baafe18d40ed/
        //更新者の検索時はそのSTOCKを更新したユーザーのみ選択肢に出す
    }

    /**
     * 変更履歴の表示
     */
    public function viewChangeHistory()
    {
        // memo:viewActivityに統合する可能性が高い
        //viewActivityの詳細確認からアクセスする
        //画面イメージ：https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/screen/6e1b0c07-0612-4784-ba3c-96144e93c411/
    }

    /**
     * 検査履歴の編集
     */
    public function editInspectionHistory()
    {

    }

    /**
     * 搬出依頼
     */
    public function requestCarryOut()
    {
        //搬出依頼の種類は「一時搬出」「ヤード間移動」「永久搬出」の3種類

        //ヤードグループ間の移動、ヤードグループ内の移動の違いは意識しなくても良いようなUIにする
        //ヤードグループ内のヤードの移動は、「ヤード間移動」に含み、搬出先YARDによってヤードグループ間移動か否かをシステム側で判別する。

        //LP2では搬出予定の時間を設定できていたが、LP3では廃止。
        //理由欄のような補足情報を記載可能な欄があるならばAM/PMの指定もなくてOK。年月日のみ指定に変更。

        //任意入力項目として「搬出理由」を追加。

        //依頼後の通知の送信先は、メールアドレスではなくユーザーを選択するようにする
    }

    /**
     * コメント
     */
    public function comment()
    {
        //画面イメージ：https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/screen/a64f3c7b-23f9-40c4-8987-22a002d77103/
        //宛先の選択は個人宛のみ。担当者がわからないので会社宛にする、といった機能は通知が増える可能性もあるため考慮しない
    }
}
