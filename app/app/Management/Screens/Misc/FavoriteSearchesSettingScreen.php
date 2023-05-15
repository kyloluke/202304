<?php

namespace App\Management\Screens\Misc;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * お気に入り検索条件のタブの設定
 */
class FavoriteSearchesSettingScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1202;
    }

    /**
     * ドキュメント用:画面カテゴリ
     *
     * @return ScreenCategory|null
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Misc;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'お気に入り検索条件のタブの設定';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'お気に入り検索条件のタブ名、並び順、表示/非表示、削除の設定をする。';
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
        return BetaViewProgress::NotCreated;
    }

    /**
     * @see Screen::docBetaViewPriority()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return parent::docBetaViewInCharge();
    }

    /**
     * 保存したお気に入り検索条件のテーブル
     */
    public function favoriteSearchListTable()
    {
        //保存したお気に入り検索条件の一覧;
        //タブ名の変更、並び順の変更、表示・非表示の切替、削除を設定可能;
        //お気に入り検索条件の条件変更は一覧の該当お気に入り条件タブより行う;
    }

}
