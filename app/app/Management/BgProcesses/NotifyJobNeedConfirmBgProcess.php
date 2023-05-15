<?php

namespace App\Management\BgProcesses;

/**
 * 要確認JOBを通知するバックグラウンド処理
 */
class NotifyJobNeedConfirmBgProcess
{
    /**
     * @return true
     */
    public function main(): bool
    {
        //JOB一覧画面の「要確認」タブで出していたアラートや未ダウンロードの書類・写真のNew表記などは通知機能へ移行
        //リリースに間に合わせられるかは要検討

        //実行タイミングや「要確認JOB」の具体的な条件は未確定

        return false;
    }
}
