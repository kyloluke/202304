<?php

namespace Services\Lp3Core\App\Http\UseCases\YardGroup;

use Services\Lp3Core\App\Http\UseCases\YardGroup\Exceptions\YardGroupDeleteException;
use Services\Lp3Core\App\Models\YardGroup;

/**
 * ヤードグループの削除
 */
class Destroy
{
    /**
     * 関数呼び出し
     * 
     * @param int $id
     */
    public function __invoke($id): YardGroup
    {
        $targetYardGroup = YardGroup::findOrFail($id);
        // 配下に削除されていないヤードが1つ以上ある場合、削除できない。
        if ($targetYardGroup->yards()->count() >= 1) {
            throw new YardGroupDeleteException(YardGroupDeleteException::HAS_ACTIVE_YARD_ERROR);
        }
        $targetYardGroup->delete();

        return $targetYardGroup;
    }
}
