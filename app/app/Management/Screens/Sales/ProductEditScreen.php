<?php

namespace App\Management\Screens\Sales;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 商品の編集画面
 *
 * 画面イメージ: https://xd.adobe.com/view/fe1a5126-5a63-49d3-bd69-9237f24fe2fa-ab49/screen/f73f3908-de39-49db-8785-6cf7786a9cb6
 * 販売単価、仕入単価のタイムラインのような表示については努力目標
 */
class ProductEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 112;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 805;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Sales;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'サービスの編集';
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
        return Worker::CreerKawano;
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
        return 'https://xd.adobe.com/view/fe1a5126-5a63-49d3-bd69-9237f24fe2fa-ab49/screen/f73f3908-de39-49db-8785-6cf7786a9cb6';
    }

    /**
     * 削除された商品を復元する
     *
     * @return bool
     */
    public function restore(): bool
    {


        return false;
    }

    /**
     * 変更履歴を表示する
     *
     * @return bool
     */
    public function viewUpdateHistories(): bool
    {
        return false;
    }

    //以下、削除された商品を復元する機能と、変更履歴を表示する機能が必要になった経緯
    //・AVANTE: 既存のマーケティングシステムでは「サービス作業履歴」というすべてのサービス(=商品)の作成/更新/削除の履歴を表示する画面があったが、LP3でも必要か？
    //・SYNC大淵: 履歴は欲しいが、各サービスの変更履歴を表示することができるのであれば、「サービス作業履歴」の画面を作成する必要はない。
    //　ただそうすると、削除の履歴を確認することができないので、削除の履歴を表示するために「サービス作業履歴」の画面は必要かもしれない。
    //・AVANTE: 車輌と同じように、サービスの一覧画面で削除されたサービスも含めて検索ができるようにし、サービスの編集画面から変更履歴の確認や削除からの復元ができるようにするのはどうか？
    //↓
    //「サービス作業履歴」の画面は作成せず、商品の編集画面で変更履歴のを表示と、削除からの復元ができるようにする。
    //
    //参考情報: 議事録/2023/03/23- 販売管理システム・放射能検査・コンテナJOB・STOCKとJOBの表示項目一覧要件定義 https://sync-logi.backlog.com/alias/wiki/2531666
}
