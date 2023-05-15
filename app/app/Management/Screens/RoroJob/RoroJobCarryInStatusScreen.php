<?php

namespace App\Management\Screens\RoroJob;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ROROJOB搬入状況一覧
 */
class RoroJobCarryInStatusScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 512;
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
        return 'ROROJOB搬入状況一覧';
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
     * デフォルトのソートを復元する
     *
     * @return bool
     */
    public function restoreDefaultSort(): bool
    {
        return false;
    }

    /**
     * 搬入状況一覧の検索
     *
     */
    public function carryInStatusListSearch()
    {
        //車台番号またはREF#で検索する
    }

    /**
     * STOCK一覧画面に遷移する
     *
     */
    public function stockScreenTransition()
    {
        //STOCK一覧画面に遷移し、搬入車輛の検索結果を表示する
        //LP2のJOB一覧で「搬入状況」をクリックしたときと同じ挙動
    }

    /**
     * 搬入状況一覧テーブルの項目
     *
     */
    public function roroJobCarryInStatusList()
    {
        //・No.
        //・車台番号
        //・REF#
        //・搬入状況
        //・現在の保管YARD
        //・別YARD在庫
        //・不動
        //・INNER CARGO
        //・写真
        //・検査合否
    }
}
