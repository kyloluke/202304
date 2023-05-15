<?php

namespace App\Management\Functions;

/**
 * コンテナ船積JOBでのドキュメントアップロード
 * 
 */
class ContainerDocUpdate
{
        /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // コンテナ船積JOB一覧画面が必要

        // ファイルアップロード画面を開くボタンが必要

        //　各種ドキュメントをアップロードする
        (new DocumentUpdate())->main();

        return false;
    }
}