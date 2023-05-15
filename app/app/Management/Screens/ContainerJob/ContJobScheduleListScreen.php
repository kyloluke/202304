<?php

namespace App\Management\Screens\ContainerJob;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * コンテナJOBスケジュール一覧画面
 *
 * 画面イメージ:https://xd.adobe.com/view/0d6147c6-1af3-44c1-993e-65a85e3341fe-5832/
 */
class ContJobScheduleListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 38;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 413;
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
        return 'コンテナJOBのスケジュール一覧';
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
        return parent::docBetaViewPriority();
    }

    /**
     * @see Screen::docBetaViewPriority()
     */
    public function docBetaViewProgress(): BetaViewProgress|null
    {
        return parent::docBetaViewProgress();
    }

    /**
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return parent::docBetaViewInCharge();
    }

    /**
     * 検索
     *
     * @return bool
     */
    public function search(): bool
    {
        //以下の項目で検索ができるようにする
        //■ 基本項目
        //・作業ヤード
        //・積地
        //・揚地
        //・仕向地
        //・SHIPPER
        //・船会社
        //・作業会社
        //・通関業者
        //・作業日 ※範囲指定
        //・CY CUT
        //・出港予定日
        //・BKG NO.
        //■ 詳細項目
        //・輸出先国
        //・本船名
        //・VOY
        //・SL担当者
        //・扱い業者
        //・BKG問合先
        //・現地代理店
        //・ドレージ
        //・CY OPEN
        //・入港予定日
        //・到着予定日
        //・搬入状況
        //・IV/PL
        //・SI
        //・EC/OTH
        //・FSI
        //・PO/AN
        //・備考

        //LP2のコンテナJOBスケジュール画面にある以下の項目については、LP3では不要
        //JOB NO.
        //CONT NO.
        //SEAL NO.
        //車台番号
        //車名
        //船積予定台数
        //荷主REF
        //確定
        //写真
        //DR
        //ED
        //BL
        //BL TYPE

        return false;
    }

    /**
     * コンテナJOBの作業スケジュールを表示する
     *
     * @return bool
     */
    public function viewContainerJobSchedule(): bool
    {
        //ヤード毎のコンテナJOBの作業スケジュールを表示する
        //LP2では複数ヤードの作業スケジュールが混在した状態での表示が出来るようにしていたが、複数ヤードの作業スケジュールが混在した状態での表示は不要

        //ヤードのすべてのコンテナJOBの作業スケジュールの表示、作業会社で絞り込んだ表示、が出来るようになっていた方が良い

        //2週間分のスケジュールを表示して作業することが多いため、1画面で2週間分表示できる状態がマスト
        //スケジュール画面での各JOBの項目は2行表示にする
        //書類のダウンロード機能はLP3では削除
        //スケジュール画面で表示する項目はLP2から変更なし。スケジュールクリック時の「対象車輛」「備考」は区切って見やすくするなど工夫が必要

        return false;
    }

    /**
     * ヤードの休日を表示する
     *
     * @return bool
     */
    public function viewYardHoliday(): bool
    {
        //表示しているヤードが所属しているヤードグループの休日設定に従い、ヤードが休日の場合は休日だと分かるような表示にする
        return false;
    }

    /**
     * コンテナJOBの作業スケジュールを編集する
     *
     * @return bool
     */
    public function editContainerJobSchedule(): bool
    {
        //ヤード毎のコンテナJOBの作業スケジュールを編集できるようにする
        //作業スケジュールの優先順位は作業会社毎に設定するのではなく、1つのヤードのコンテナJOBすべてで共通する優先順位を設定するようにする

        //コンテナJOBの作業スケジュールをヤードの休日にすることはできないように制限をかける

        //ヤードグループ単位での作業スケジュールの編集の機能は不要
        //参考:2022/10/27 SYNC大淵さんとの打ち合わせ https://sync-logi.backlog.com/alias/wiki/2232752

        return false;
    }

    /**
     * 複数選択でコンテナJOBの作業スケジュールを編集する
     *
     * @return bool
     */
    public function editContainerJobScheduleWithMultipleSelection(): bool
    {
        //複数選択をしてドラッグ&ドロップができるとより便利、という機能なので、優先度は低い
        return false;
    }
}
