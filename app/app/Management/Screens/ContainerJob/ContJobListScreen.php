<?php

namespace App\Management\Screens\ContainerJob;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * コンテナ一JOB一覧画面
 */
class ContJobListScreen extends Screen
{
    //画面イメージ: https://xd.adobe.com/view/4cbb3daf-7c77-4424-a201-a69f13f7d5e0-19e8/

    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 24;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 401;
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
        return 'コンテナJOBの一覧画面';
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
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/4cbb3daf-7c77-4424-a201-a69f13f7d5e0-19e8/';
    }

    /**
     * 検索フォームの入力項目を折りたたむ
     *
     * @return bool
     */
    public function foldSearchFormControls(): bool
    {
        return false;
    }

    /**
     * ステータスタブ
     *
     * @return bool
     */
    public function statusTab(): bool
    {
        //検索フォームで指定した条件のコンテナJOBのうち、該当のステータスのコンテナJOBが何件あるかを表示する
        //
        //すべてのコンテナJOBを「すべて」タブで常に表示させる。STOCK一覧の画面と統一性をはかるため「すべて」タブは一番右端に配置する。
        //
        //LP2の「要確認」タブは形骸化しており誰も確認していないとのことなので、LP3では廃止。
        //入力すべき人に対して通知が出されれば良いので、「要確認タブ」で出していたアラートは通知機能に移行する。

        return false;
    }

    /**
     * お気に入りの検索条件
     * @return bool
     */
    public function favoriteSearches(): bool
    {
        //コンテナJOBにもSTOCKと同様にお気に入りの検索条件の機能を追加
        //「条件を設定」のタブがアクティブのとき、「検索条件を保存」ボタンからお気に入り検索条件のタブを追加する。
        //ユーザーが作成したお気に入り検索条件のタブがアクティブのとき、「検索条件を保存」ボタンが「検索条件を上書き」ボタンに置き換わり、上書き保存が可能にする。
        //タブは幅を固定し、タブ内の文字は固定幅に表示できる分のみ表示、タブは検索フォームの横幅に収まる数のみ表示可能にする。

        return false;
    }

    /**
     * デフォルトのソートを復元する
     *
     * @return bool
     */
    public function restoreDefaultSort(): bool
    {
        return false;
    }

    /**
     * 請求登録する
     *
     * @return bool
     */
    public function registerBilling(): bool
    {
        //1つのコンテナJOBに対して1つの請求を登録する場合と、複数のコンテナJOBをまとめて1つの請求を登録する場合の2パターンに対応出来る必要がある
        //「複数のコンテナJOBをまとめて1つの請求を登録する場合」は、LP2では「同一請求」と表現していた
        //以下、シーラベルの文言案
        //・1つの請求書にまとめて登録
        //・個別の請求書として登録

        return false;
    }

    /**
     * フレイト一括登録
     */
    public function bulkJobFreightEdit()
    {
        //LP3より明細の追加には見積が必須になるため、一括での登録条件が厳しくなるが、一括での登録は残したい
        //フレイト登録画面遷移時のエラーチェックを「同一請求」の条件と一致させ、それ以外の原因でエラーが起きるのは許容する
    }

    /**
     * JOB一覧検索項目
     * https://docs.google.com/spreadsheets/d/1ckii8c7FDGl9g8k7qQGQmcfrV5MxzOlnkBIXCV6EAOI/edit?usp=share_link
     */
    public function contJobListSearch()
    {
        //「詳細検索項目」は折りたたみ
        //一覧画面にないが検索はできるようにしている項目は、データ(CSV)ダウンロード時には表示

        //標準検索項目
        //・JOB NO.
        //・SHIPPER
        //・作業YARD
        //・作業日程
        //・船会社
        //・BKG NO.
        //・CONT NO.
        //・本船名
        //・VOY
        //・積地
        //・CYCUT
        //・出港予定日
        //・揚地
        //・入港予定日
        //・仕向地
        //・到着予定日
        //・フレイト登録
        //・書類(IV/PL	SI	EC/OTH	FSI	PO/AN	DR	ED	BL)
        //・写真
        //・注意
        //・搬入状況
        //・船積予定台数
        //・車台番号
        //・荷主REF
        //・船積確定

        //詳細検索項目
        //・BILL NO.
        //・扱い業者(一覧テーブルにはなし、検索はあり)
        //・BKG問合先(一覧テーブルにはなし、検索はあり)
        //・(BL TYPE)
        //・作業会社
        //・ドレージ
        //・通関業者
        //・SEAL NO.(一覧テーブルにはなし、検索はあり)
        //・車名(一覧テーブルにはなし、検索はあり)
        //・輸出先国(一覧テーブルにはなし、検索はあり)
        //・現地代理店(揚地)
        //・現地代理店(仕向地)
        //・船積担当者
        //・備考
        //・ハッシュタグ

        //以下は一覧テーブルにあるが検索はなし。
        //・最終更新者
        //・更新日時

        //LP2にはあった以下検索項目は削除
        //・CY OPEN
    }

    /**
     * JOB一覧テーブルの項目
     *
     */
    public function contJobListTable()
    {
        //LP2の「列の編集」は廃止し、項目を絞った「標準表示」モードと「詳細表示」モードを切り替えられるようにする。

        //一列目固定表示
        //・チェックボックス
        //・JOB NO.

        //標準表示項目一行目
        //・SHIPPER
        //・作業YARD
        //・作業日程
        //・船会社
        //・BKG NO.(口数)
        //・CONT NO.
        //・本船名
        //・積地
        //・CY CUT
        //・出港予定日
        //・揚地
        //・入港予定日
        //・仕向地
        //・到着予定日

        //標準表示項目二行目
        //・フレイト登録
        //・書類(IV/PL SI	EC/OTH	FSI	PO/AN	DR	ED	BL)
        //・写真
        //・注意

        //標準表示項目三行目
        //・搬入状況
        //・車台番号
        //・荷主REF

        //詳細表示一行目(標準表示一行目と二行目の間に表示)
        //・BILL NO.
        //・作業会社
        //・(BL TYPE)
        //・ドレージ
        //・通関業者
        //・現地代理店(揚地)
        //・現地代理店(仕向地)
        //・船積担当者
        //・最終更新者
        //・更新日時

        //詳細表示二行目(標準表示項目三行目の下に表示)
        //・備考
    }
}
