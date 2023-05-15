<?php

namespace App\Management\Screens;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;

/**
 * 画面
 *
 * 共通仕様など、置き場に困る場合は一旦このクラスに記述する
 */
abstract class Screen
{
    /**
     * ドキュメント用:要件定義時のID
     *
     * @return int|null
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return null;
    }

    /**
     * ドキュメント用:ID
     */
    public function docId(): int|null
    {
        return null;
    }

    /**
     * ドキュメント用:画面カテゴリ
     *
     * @return ScreenCategory|null
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return null;
    }

    /**
     * ドキュメント用:名前
     *
     * @return string|null
     */
    public function docName(): string|null
    {
        return null;
    }

    /**
     * ドキュメント用:備考
     *
     * @return string|null
     */
    public function docRemarks(): string|null
    {
        return null;
    }

    /**
     * ドキュメント用:画面イメージの進捗
     *
     * @return Worker|null
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return ScreenImageProgress::NotCreated;
    }

    /**
     * ドキュメント用:画面イメージの担当者
     *
     * @return Worker|null
     */
    public function docScreenImageInCharge(): Worker|null
    {
        return null;
    }

    /**
     * ドキュメント用:β版のViewの優先度
     *
     * @return Priority
     */
    public function docBetaViewPriority(): Priority
    {
        //マスタ系は同じような画面なら１つあればよい
        return Priority::Low;
    }

    /**
     * ドキュメント用:β版のViewの進捗
     *
     * @return Worker|null
     */
    public function docBetaViewProgress(): BetaViewProgress|null
    {
        return BetaViewProgress::NotCreated;
    }

    /**
     * ドキュメント用:β版のViewの担当者
     *
     * @return Worker|null
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return null;
    }

    /**
     * ドキュメント用:β版のViewの完成予定日
     *
     * @return Worker|null
     */
    public function docBetaViewScheduledCompletionDate(): string|null
    {
        return null;
    }

    /**
     * ドキュメント用:β版のViewの完成予定日(拡張版)
     *
     * @return Worker|null
     */
    final public function docBetaViewScheduledCompletionDateEx(): string|null
    {
        return $this->docBetaViewProgress() == BetaViewProgress::Created ? '-' : $this->docBetaViewScheduledCompletionDate();
    }

    /**
     * ドキュメント用:β版の機能の優先度
     *
     * @return Priority
     */
    public function docBetaFeaturePriority(): Priority
    {
        return Priority::Low;
    }

    /**
     * ドキュメント用:画面イメージURL
     * @see Screen::docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return null;
    }

    /**
     * フォント
     *
     * @return bool
     */
    public function font(): bool
    {
        //基本的にフォントは以下のものを優先的に使用する
        // 1. Hiragino Sans
        //    - Mac環境用のフォントで、シーラベルが作成したデザインに使われていたフォント
        // 2. Noto Sans JP
        //    - Mac以外の環境用のフォントで、特に指定があったわけではないがSYNCの日本語ホームページに準拠
        // 3. Arial
        //    - 2022/12/23の打ち合わせで、視認性の高いフォントの例としてあがったフォント
        //
        //参考資料: https://xd.adobe.com/view/a11dd882-7b2f-4bcc-aa99-b2e77425db35-f44e

        return true;
    }

    /**
     * リンク
     *
     * @return bool
     */
    public function link(): bool
    {
        //基本的な方針として、システム内のリンクは自タブで、外部ドメインへのリンクは別タブで開くようにする。
        //システム内のリンクを別タブで開きたい場合は、右クリックなどの操作でやらせるようにする。

        //改善案
        //現在基本的には別ページにいく度にtarget_blank設定になっているが、基本的にはtarget_blank設定をしない
        //ただし、ページによってUX的に別ウィンドウで開いた方がユーザビリティ的に望ましいのであれば開くようにする

        return true;
    }
}
