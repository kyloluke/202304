<?php

namespace Services\Lp3Core\App\Http\Resources\Login;

use Services\Lp3Core\App\Models\Model;

/**
 * APIドキュメント生成用のログアウトリソースモデル
 */
class LogoutResourceModel extends Model
{
    /**
     * @see Model::toArray()
     */
    public function toArray()
    {
        return false;
    }
}
