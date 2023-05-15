<?php

namespace App\Management\Requirements;

/**
 * La-Plus３：開発主要要件一覧　No.8
 */
class Requirement8
{
    //機能カテゴリ(サービス)
    //車輌管理

    //サブカテゴリ
    //登録・編集

    //要件・要望
    //一括削除機能がほしい

    //補足
    //ただし、一括削除できるひとは権限で限定しないと危なそう

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // @todo 一括削除ができる権限は具体的に何？
        return false;
    }
}
