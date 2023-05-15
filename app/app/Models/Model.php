<?php

namespace App\Models;

/**
 * モデルの基底クラス
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    // $fillable は、どこで何を変更しているのかが分かりづらくなってしまうため、極力使用しないようにしてください。

    // ■ ローカルスコープ
    // ・条件のローカルスコープを作成する場合は、「scopeWhereXXX」のようなメソッド名にしてください。
}
