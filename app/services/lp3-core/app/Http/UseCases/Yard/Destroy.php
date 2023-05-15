<?php

namespace Services\Lp3Core\App\Http\UseCases\Yard;

use Services\Lp3Core\App\Http\UseCases\Yard\Exceptions\YardDeleteException;
use Services\Lp3Core\App\Models\Yard;

/**
 * ヤードの削除
 */
class Destroy
{
    /**
     * 関数呼び出し
     * 
     * @param int $id
     */
    public function __invoke($id): Yard
    {
        // 削除が可能である条件：以下の3つの条件を全て満たしている場合
        // （削除が不可能になる条件は記述量が膨大になるため、削除が可能である条件を記述しております）
        // (1) 対象のヤードが一度も使用されていないこと（搬入履歴などで使用されている場合はNG）
        // (2) 対象のヤードが代表ヤードではないこと
        // (3) 対象のヤードと対象のヤードが所属しているヤードグループが1対1であること
        $targetYard = Yard::findOrFail($id);
        if (
            // @todo：(1)の条件を書く
            $targetYard->id != $targetYard->yardGroup->representative_yard_id &&
            $targetYard->yardGroup->yards()->count() == 1
        ) {
            $targetYard->delete();
            return $targetYard;
        }
        throw new YardDeleteException(YardDeleteException::DELETE_USED_YARD_ERROR);
    }
}
