<?php

namespace App\Management\Requirements;

/**
 * ヒアリング改善要望 No.19
 */
class ClabelHearing19
{
    // 課題＆要望
    // 最後に誰がなんの作業をしたかを確認したい

    // 背景/理由
    // 検索条件に入れられるようにしたい(撮影/写真アップロード日など)

    // メモ
    // 何日に何台の写真をアップしたのか見えるようにしたいというニーズなのではないか
    // ※STEP4に近い3のイメージ。
    // 内容によってはログを残すのも大事だと思うが、優先度としては低い

    // ---

    // 優先度: STEP3 なので後回し

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        return false;
    }
}
