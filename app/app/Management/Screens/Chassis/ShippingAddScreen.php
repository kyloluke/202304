<?php

namespace App\Management\Screens\Chassis;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車輛詳細から既存のコンテナ・RORO船積みJOBへの車輛追加
 */
class ShippingAddScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 217;
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
        return '車輛詳細から既存のコンテナ・RORO船積みJOBへの車輛追加';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '車輛詳細から既存のコンテナ・RORO船積みJOBへ車輛を追加する';
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
     * @see Screen::docBetaViewPriority()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteHara;
    }

    /**
     * JOBの候補の検索
     */
    public function jobSearch()
    {
        //・輸送方法
        //・積地
        //・揚地
        //・JOB NO.
        //・備考
        //・ハッシュタグ
    }

    /**
     * 検索結果の表示
     */
    public function jobSearchResult()
    {
        //以下の項目で候補からJOBを選択可能
        //・JOB NO.
        //・作業YARD
        //・通関業者
        //・蔵主
        //・ドレー業者
        //・本船名
        //・BKG NO.
        //・JOBに登録済みの車台番号

        //該当するJObが見つからない場合は、輸送方法で選択したJOBの作成画面へ遷移
    }

}
