<?php

namespace App\Management\Requirements;

/**
 * 非機能要件
 */
class NonFunctionalRequirement
{
    // > 1.5 対応ブラウザ (変更あり)
    // > Edge/Chrome/safari　 (将来的にスマートフォン対応予定)
    // > 引用元: 要件定義/非機能要件  https://sync-logi.backlog.com/alias/wiki/2195047
    //
    //対応ブラウザ: Edge/Chrome/safari

    // > スマホは将来対応(Android,iOS)
    // > 引用元: 議事録/2022/10/13- 非機能要件 https://sync-logi.backlog.com/alias/wiki/2197990
    //
    //スマホは将来的に対応するようにするが、当面は無視する

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
