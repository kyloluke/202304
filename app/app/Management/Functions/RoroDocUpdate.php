<?php

namespace App\Management\Functions;

/**
 * RORO船積JOBでのドキュメントアップロード
 * 
 */
class RoroDocUpdate
{
        /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // RORO船積JOB一覧画面が必要

        // ファイルアップロード画面を開くボタンが必要

        //　各種ドキュメントをアップロードする
        (new DocumentUpdate())->main();

        return false;
    }
}