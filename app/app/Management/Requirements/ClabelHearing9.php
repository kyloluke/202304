<?php

namespace App\Management\Requirements;

use App\Management\Screens\Screen;

/**
 * ヒアリング改善要望 No.9
 */
class ClabelHearing9
{
    //課題＆要望
    //ページを開くごとにタブが開かれるのがやりにくい

    //背景/理由
    //(なし)

    //改善案
    //現在基本的には別ページにいく度にtarget_blank設定になっているが、基本的にはtarget_blank設定をしない
    //ただし、ページによってUX的に別ウィンドウで開いた方がユーザビリティ的に望ましいのであれば開くようにする

    //メモ
    //(アバンテさん)
    //元々はシンク側からのリクエストであえて新規タブで開く仕様にした。要望に応じて2パターン作ったほうが良さそう。多分シンクさん内ではウィンドウ並べて作業するのではないか？
    //(大淵さん)
    //右クリックで新規タブで開く、という形をやらせれば良いのかも。
    //複数タブおいて作業したい人＝メニュー毎でタブがある想定
    //
    //(渡辺)
    //外部ドメインに関しては別ウインドウにした方が良いかも

    /**
     * main
     *
     * @return bool
     */
    public function main(Screen $screen): bool
    {
        $screen->link();

        return true;
    }
}
