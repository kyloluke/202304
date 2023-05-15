<?php

namespace Services\Lp3Core\App\Http\UseCases\Destination;

use Services\Lp3Core\App\Models\Destination;

class Destroy
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Destination
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return $destination;
    }
}
