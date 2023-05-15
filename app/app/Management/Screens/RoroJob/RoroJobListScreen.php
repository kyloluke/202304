<?php

namespace App\Management\Screens\RoroJob;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ROROJOB画面
 */
class RoroJobListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 39;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 501;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::RoroJob;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ROROJOBの一覧';
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
     * @see Screen::docBetaViewScheduledCompletionDate()
     */
    public function docBetaViewScheduledCompletionDate(): string|null
    {
        return '2023/4/14';
    }

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/ef6c8d79-730c-4fe8-8ee8-3954210781aa-ba3f/';
    }

    /**
     * ステータスタブ
     *
     * @return bool
     */
    public function statusTab(): bool
    {
        //検索フォームで指定した条件のROROJOBのうち、該当のステータスのROROJOBが何件あるかを表示する
        //
        //すべてのROROJOBを「すべて」タブで常に表示させる。STOCK一覧の画面と統一性をはかるため「すべて」タブは一番右端に配置する。
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
        //ROROJOBにもSTOCKと同様にお気に入りの検索条件の機能を追加

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
        //1つのROROJOBに対して1つの請求を登録する場合と、複数のROROJOBをまとめて1つの請求を登録する場合の2パターンに対応出来る必要がある
        //「複数のROROJOBをまとめて1つの請求を登録する場合」は、LP2では「同一請求」と表現していた
        //以下、シーラベルの文言案
        //・1つの請求書にまとめて登録
        //・個別の請求書として登録

        return false;
    }

    /**
     * JOB一覧検索項目
     * https://docs.google.com/spreadsheets/d/1ckii8c7FDGl9g8k7qQGQmcfrV5MxzOlnkBIXCV6EAOI/edit?usp=share_link
     */
    public function roroJobListSearch()
    {
        //「詳細検索項目」は折りたたみ
        //一覧画面にないが検索はできるようにしている項目は、データ(CSV)ダウンロード時には表示

        //標準検索項目
        //・JOB NO.
        //・SHIPPER
        //・船積YARD
        //・船会社
        //・BKG NO.
        //・本船名
        //・VOY
        //・積地
        //・SO CUT
        //・出港予定日
        //・揚地
        //・入港予定日
        //・仕向地
        //・到着予定日
        //・輸出先国
        //・フレイト登録
        //・書類(IV	SI/FSI	EC	MRK	ECR	RI	SO	ED	BL)
        //・注意
        //・搬入状況
        //・車台番号
        //・荷主REF
        //・船積確定
        //・備考
        //・ハッシュタグ

        //詳細検索項目
        //・BILL NO.
        //・扱い業者
        //・BKG問合先
        //・BL TYPE
        //・通関業者
        //・現地代理店（揚地)
        //・現地代理店（仕向地)
        //・船積担当者

        //以下は一覧テーブルにあるが検索はなし。
        //・船積予定台数
        //・最終更新者
        //・更新日時

        //LP2にはあった以下検索項目は削除
        //・作業会社
    }

    /**
     * JOB一覧テーブルの項目
     *
     */
    public function roroJobListTable()
    {
        //LP2の「列の編集」は廃止し、項目を絞った「標準表示」モードと「詳細表示」モードを切り替えられるようにする。
        //車台番号と荷主REFは一行で表示できる分のみ表示し、表示しきれない分は「+残り台数」と表示する。
        //「+残り台数」および搬入状況をクリックすると搬入状況一覧がモーダルで表示され、すべての車輛を確認できる
        //別ヤード在庫がある場合は搬入状況の横に注意ラベルを表示する

        //一列目固定表示
        //・チェックボックス
        //・JOB NO.
        //・注意

        //標準表示項目一行目
        //・SHIPPER
        //・船積YARD
        //・船会社
        //・BKG NO.
        //・本船名
        //・積地
        //・SO CUT
        //・出港予定日
        //・揚地
        //・入港予定日
        //・仕向地
        //・到着予定日
        //・輸出先国

        //標準表示項目二行目
        //・フレイト登録
        //・書類(IV SI/FSI EC MRK ECR RI SO ED BL)

        //標準表示項目三行目
        //・搬入状況
        //・車台番号
        //・荷主REF

        //標準表示項目三行目
        //・備考

        //詳細表示一行目(標準表示一行目と二行目の間に表示)
        //・BILL NO.
        //・BL TYPE
        //・通関業者
        //・現地代理店(揚地)
        //・現地代理店(仕向地)
        //・船積担当者
        //・最終更新者
        //・更新日時
    }
}
