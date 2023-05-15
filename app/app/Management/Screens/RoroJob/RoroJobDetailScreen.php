<?php

namespace App\Management\Screens\RoroJob;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ROROJOB詳細画面
 *
 * アクション「船積確定」は作業確定後、確定した作業を「解除」する機能に変更する。
 */
class RoroJobDetailScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 508;
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
        return 'ROROJOBの詳細';
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
        //画面イメージ(コンテナJOBと共通)：https://xd.adobe.com/view/4cbb3daf-7c77-4424-a201-a69f13f7d5e0-19e8/screen/45b7744e-447f-44a0-be81-d4add0b09d1f/
        //更新者の検索時はそのSTOCKを更新したユーザーのみ選択肢に出す
    }

    /**
     * 変更履歴の表示
     */
    public function viewChangeHistory()
    {
        //viewActivityの詳細確認からアクセスする
        //画面イメージ(コンテナJOBと共通)：https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/screen/6e1b0c07-0612-4784-ba3c-96144e93c411/
    }

    /**
     * コメント
     */
    public function comment()
    {
        //画面イメージ(コンテナJOBと共通)：https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/screen/a64f3c7b-23f9-40c4-8987-22a002d77103/
        //宛先の選択は個人宛のみ。担当者がわからないので会社宛にする、といった機能は通知が増える可能性もあるため考慮しない
    }
}
