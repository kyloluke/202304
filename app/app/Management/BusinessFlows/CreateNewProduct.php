<?php

namespace App\Management\BusinessFlows;

use App\Management\Functions\ProductSchemeCreate;
use App\Management\Functions\ProductSchemeSearch;
use App\Management\Functions\ProductSchemeUpdate;

/**
 * 新サービス作成
 */
class CreateNewProduct extends BusinessFlow
{
    
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 49;
    }
    
	/**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '新サービス確定';
    }
    
	/**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '';
    }

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //アクター:SYNCヤード運営マネージャー
        //仕入、売値、サービス設計をする

        //商品スキームの検索機能を使う
        (new ProductSchemeSearch())->main();
        //商品スキームが作成済みか？
        $exists = true;

        //商品スキームが未作成の場合
        if (!$exists) {
            //アクター:SYNCヤード運営マネージャー
            //SYNC LPシステム管理者に、商品スキームの作成の連絡をする(システム外)

            //アクター:SYNC LPシステム管理者
            //商品スキームを作成or更新する
            (new ProductSchemeCreate())->main();
            (new ProductSchemeUpdate())->main();
        }

        //アクター:SYNCヤード運営マネージャー
        //新サービスを作成する
        // @todo 商品の作成機能を作る

        //アクター:SYNCヤード運営マネージャー
        //各SYNC営業スタッフに、見積書作成の連絡をする(システム外)

        //アクター:各SYNC営業スタッフ
        //見積書作成(別業務フロー)
        // @todo 見積書作成の業務フローを作る

        return false;
    }
}
