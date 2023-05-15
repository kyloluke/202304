<?php

namespace App\Management\BusinessFlows;

/**
 * 仕入れ値・価格変更
 */
class PriceChange extends BusinessFlow
{

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 50;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '仕入れ値・価格変更';
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

        //SYNCヤード運営MNGがサービスの仕入れ値・価格を変更する。
        // @todo サービスの仕入れ値・価格変更機能を作成する。

        //SYNCヤード運営MNGがSYNC営業スタッフに再見積依頼の連絡をする。

        //連絡を受けたSYNC営業スタッフが再見積もりを行う。

        //再見積もりするか否か
        $reestimate = true;

        if ($reestimate) {
            //再見積する場合

            //SYNC営業スタッフが再見積を行う。
            // @todo 見積書作成機能を作成する。(別業務フロー)
            (new CretaeQuotation())->main();

        } else {
            //再見積しない場合、売値は現行の見積価格のまま。仕入れ値は新しい金額となる。
        }

        return false;
    }
}
