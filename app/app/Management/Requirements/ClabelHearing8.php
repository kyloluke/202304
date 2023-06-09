<?php

namespace App\Management\Requirements;

/**
 * ヒアリング改善要望 No.8
 */
class ClabelHearing8
{
    //課題＆要望
    //コンテナスケジュール内の作業がない日に関してメール通知が来るようにして欲しい

    //背景/理由
    //(なし)

    //改善案
    //・ある日付の特定のyardが0件の場合の時に、0件であるということを確定できるようにする
    //
    //仕様は要検討

    //メモ
    //・開発タスクとして軽めであればSTEP１に入れる。重めであればSTEP2に回す
    //
    //大淵さんコメントメモ：本来ならしてあげたほうがよい。
    //金曜の作業予定は水曜のいつまでにしておいてくださいという締め期日はある。例えば年末年始などは締め期日も変わるので自動判別は難しそう。
    //■メモ：
    //コンテナスケジュールは現在作業日ベースでのビューだが、出航日べースや、cut日ベースで見たいなどの要望がある。
    //また、別要件でyard毎の休日設定ができるようにしたいという要望がある。
    //それらの要件と合わせて整理したほうがよいかもしれない。
    //
    //■11/15議論
    //・1yardに複数のバンニング作業者がいる場合もある。一部のバンニング作業者のみが0件という場合もある。
    //・アバンテさんからの提案：特定の期日を越えたら、自動で通知
    //→大淵さん：日々作業があまりないyardもある
    //→アバンテさん：受信設定でメールを受けるかどうかを設定できる
    //・大淵さん：手動がよいかと思っている
    //・渡辺：日付×yard×作業会社で、作業がない会社がわかることが必要

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //優先度が「STEP2」になっているので後回しとする

        return false;
    }
}
