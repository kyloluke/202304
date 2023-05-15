<?php

namespace App\Management\Functions;

/**
 * 削除された車輌の復旧
 */
class ChassisRestore
{
    //LP3要件・要望
    //間違って削除した場合の復旧措置

    public function main(): bool
    {
        //車輌一覧画面から、削除された車輌を含めて検索ができるようにする
        //車輌一覧画面の検索結果から車輌詳細画面に移動すると、復旧の操作ができるようにする
        //複数の車輌を選択して一括で復旧する、という操作はできないようにする
        // @todo ↑をふまえて、画面、APIなど必要なものを作成する

        //復元ができるのは、システム運営会社のSilver以上の権限があるユーザーのみとする
        //参考資料: https://docs.google.com/spreadsheets/d/1DTcE5cTqGIftRQaI2R6BkjAiuo3YngZX/edit#gid=2116390377

        return false;
    }
}
