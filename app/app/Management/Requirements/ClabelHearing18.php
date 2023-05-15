<?php

namespace App\Management\Requirements;

use App\Management\Models\Yard;

/**
 * ヒアリング改善要望 No.18
 */
class ClabelHearing18
{
    // 課題＆要望
    // 自分のヤードだけ見れるようにしてほしい

    // 背景/理由
    // 利用していないヤードも候補として表示されてしまう点

    // メモ
    // 一木さんとしては表示させていることで営業になるだろう。
    // もしそれをしたいとすると、HPへのリンクを貼るなどが考えられる。

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // ヤード検索では実績のあるヤード以外は検索リストに表示されないようにする。
        (new Yard())->getListForShipper();
        return true;
    }
}
