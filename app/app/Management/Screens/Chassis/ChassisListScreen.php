<?php

namespace App\Management\Screens\Chassis;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車輌一覧画面
 */
class ChassisListScreen extends Screen
{
    //画面イメージ: https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/
    //
    //以下、旧画面イメージ
    //1. CLABELの画面イメージ: https://xd.adobe.com/view/2023e108-7a6e-4683-b6d2-0b4b8b9535e6-7570/
    //   ↑の右上に「全画面」「パネル」というボタンがあるが、これはダッシュボード画面の表示の切り替えのためのボタンで、車輌一覧画面では必要ない

    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 6;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 201;
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
        return '車輌の一覧';
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

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/';
    }

    public function search()
    {
        // @todo 整理する
        //全体視点、ヤード視点の切り替えについて
        //ヤード視点の選択肢は末端のヤードだけでよい、ヤードグループは選択肢から省く
        //歯車マークをステータスタブの右に配置する

        //検索フォームのステータスの選択肢
        //■全体視点の場合
        //・搬入前
        //　・初回搬入前
        //・保管中
        //　・搬入中
        //　・一時搬出中
        //　・ヤード間移動中
        //・搬出後
        //　・輸出済み
        //　・CYヤード搬入中
        //　・GO DOWN済み
        //　・内貨搬出済み
        //■ヤード視点の場合
        //・搬入前
        //　・搬入前
        //・保管中
        //　・搬入中
        //　・一時搬出中
        //・搬出後
        //　・輸出済み
        //　・CYヤード搬入中
        //　・GO DOWN済み
        //　・内貨搬出済み
        //
        //・複数選択可能
        //・トップレベルの搬入中、保管中、搬出後を選択した場合は配下のステータスをすべて選択するようにする
        //
        //参考:車輌一覧検索項目のフィルタリングについて.drawio https://app.diagrams.net/#G1BubRDc5nEIcbG_RhhVy7WmXKWDB-_ToD

        //詳細検索の条件で、「削除済み車輛を含める」のON/OFFを選択出来るようにする
    }

    public function searchByCustomLabel()
    {
        //通常モードの場合はカスタムラベルでの検索は不要
        //OSLモードの場合はカスタムラベルでの検索が必要
    }

    /**
     * 検索フォームの入力項目を折りたたむ
     *
     * @return bool
     */
    public function foldSearchFormControls(): bool
    {
        //CLABELの車輌一覧画面の画面イメージの「さらに絞り込み条件を追加」が該当する

        return false;
    }

    /**
     * ステータスタブ
     *
     * @return bool
     */
    public function statusTab(): bool
    {
        //検索フォームで指定した条件の車輌のうち、該当のステータスの車輌が何台あるかを表示する
        //
        //表示するステータスは検索フォームのステータスの選択肢のトップレベルのものと一致させる。
        //↑のステータスのトップレベルの「搬入前」「保管中」「搬出後」の3つを常に表示するようにし、マウスオーバーで配下の細かいステータスを表示できるようにする
        //
        //すべての車輛を「すべて」タブで常に表示させる。JOB一覧の画面と統一性をはかるため「すべて」タブは一番右端に配置する。
        //
        //詳細検索の条件で「削除済み車輛を含める」にチェックがついている場合のみ、削除済みタブを出現させる。
        //
        //該当のステータスの車輌が1台以上ある場合はクリックで選択できるようにする
        //
        //参考:https://app.diagrams.net/#G1BubRDc5nEIcbG_RhhVy7WmXKWDB-_ToD

        return false;
    }

    /**
     * お気に入りの検索条件
     * @return bool
     */
    public function favoriteSearches(): bool
    {
        //「条件を設定」のタブがアクティブのとき、「検索条件を保存」ボタンからお気に入り検索条件のタブを追加する。
        //ユーザーが作成したお気に入り検索条件のタブがアクティブのとき、「検索条件を保存」ボタンが「検索条件を上書き」ボタンに置き換わり、上書き保存が可能にする。
        //タブは幅を固定し、タブ内の文字は固定幅に表示できる分のみ表示、タブは検索フォームの横幅に収まる数のみ表示可能にする。

        return false;
    }

    /**
     * デフォルトのソートを復元する
     * @return bool
     */
    public function restoreDefaultSort(): bool
    {
        //画面イメージに反映済み
        return false;
    }

    /**
     * 列の可視不可視を設定する
     */
    public function setColumnVisibility(): bool
    {
        //CLABELの車輌一覧画面の画面イメージには反映済み
        //「列を編集」のボタンから可視不可視を設定できる

        //LP2の、1列に複数行の項目を表示する、というのは維持し、2行目以降の表示のON(=詳細表示)/OFF(=簡易表示)をさせる、というアイディアの検討中 担当:SYNC大淵さん
        //↑を採用する場合をまとめると、列グループのON/OFF＋2行目以降の表示のON/OFFを設定する、ということになる
        //↑を採用する場合は、ON/OFFの選択を記憶させ、毎回選択をさせないようにする

        // @todo 整理する 一覧テーブルとかの項目にする
        //また、LP2の一覧の中のデータのマウスオーバーで詳細情報を表示する、というのはマウスを動かすたびに何かが表示されたり消えたりするのがいまいちなので、LP3では採用しない

        return false;
    }

    /**
     * 車輌のCSV一括作成
     * @return void
     */
    public function bulkCreatebyCsv()
    {

    }

    /**
     * 車輌のCSV一括更新
     * @return void
     */
    public function bulkUpdatebyCsv()
    {
    }

    /**
     * 車輌の一括削除
     */
    public function bulkDelete()
    {

    }

    /**
     * CSVのダウンロード
     */
    public function downloadCsv()
    {

    }

    /**
     * 寸法取込用CSVのダウンロード
     * @return void
     */
    public function downloadCsvForImportDimension(): void
    {

    }

    /**
     * 写真の表示
     */
    public function viewPhoto()
    {

    }

    /**
     * 変更履歴の表示
     */
    public function viewChangeHistory()
    {

    }

    /**
     * 写真のダウンロード
     */
    public function downloadPhoto()
    {

    }

    /**
     * 写真の一括ダウンロード
     */
    public function bulkDownloadPhoto()
    {

    }

    /**
     * 搬出依頼
     */
    public function requestCarryOut()
    {
        //ヤードグループ間の移動、ヤードグループ内の移動の違いは意識しなくても良いようなUIにする
    }

    /**
     * 請求一括登録
     */
    public function bulkChassisBilling()
    {
        //LP3より明細の追加には見積が必須になるため、一括での登録条件が厳しくなるが、一括での登録は残したい
        //請求登録画面遷移時に選択された車輛が同一SHIPPERか否かのみをチェックし、それ以外の原因でエラーが起きるのは許容する
    }

    /**
     * 車輛一覧検索項目
     * https://docs.google.com/spreadsheets/d/1ckii8c7FDGl9g8k7qQGQmcfrV5MxzOlnkBIXCV6EAOI/edit?usp=share_link
     *
     */
    public function chassisListSearch()
    {
        //「詳細検索項目」は折りたたみ
        //一覧画面にないが検索はできるようにしている項目は、データ(CSV)ダウンロード時には表示

        //標準検索項目
        //・入庫NO.
        //・保管YARD
        //・SHIPPER
        //・車名
        //・車台番号
        //・初回搬入日
        //・搬出予定日
        //・搬出日
        //・作業日
        //・仕向地
        //・輸出先国
        //・STATUS
        //・輸出前検査種別
        //・検査合否
        //・貨物写真
        //・備考
        //・ハッシュタグ

        //詳細検索項目
        //・JOB NO.
        //・扱い業者
        //・BILL NO.
        //・M3
        //・船積YARD
        //・船会社
        //・BKG NO.
        //・輸送方法(一覧テーブルにはなし、検索はあり)
        //・本船名
        //・VOY
        //・積地
        //・出港予定日
        //・揚地
        //・車輛状態(一覧テーブルには「不動」ラベルのみあり)
        //・注意
        //・削除済み車輛を含める

        //以下は一覧テーブルにあるが検索はなし。
        //・保管日数
        //・FREE
        //・FREE超過
        //・最終更新者
        //・更新日時

        //LP2にはあった以下検索項目は削除
        //・SL担当者
        //・現地代理店
        //・BKG問合先
        //・入港予定日
        //・放射能検査
    }

    /**
     * 車輛一覧テーブルの項目
     *
     */
    public function ChassisListTable()
    {
        //LP2の「列の編集」は廃止し、項目を絞った「標準表示」モードと「詳細表示」モードを切り替えられるようにする。

        //一列目固定表示
        //・チェックボックス
        //・入庫 NO.
        //・写真
        //・注意

        //標準表示項目一行目
        //・保管YARD
        //・SHIPPER
        //・車名
        //・車台番号
        //・初回搬入日
        //・保管日数
        //・搬出予定日時
        //・搬出日(作業日)
        //・仕向地
        //・輸出先国
        //・STATUS
        //・搬出予定日時
        //・輸出前検査種別
        //・輸出前検査種別合否

        //標準表示項目二行目
        //・備考

        //詳細表示一行目(標準表示一行目と二行目の間に表示)
        //・JOB NO.
        //・BILL NO.
        //・FREE
        //・FREE超過
        //・M3
        //・船積みYARD
        //・船会社
        //・BKG NO.
        //・本船名/VOY
        //・積地
        //・出港予定日
        //・揚地
        //・最終更新者
        //・更新日時
    }
}
