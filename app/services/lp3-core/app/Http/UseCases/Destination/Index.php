<?php

namespace Services\Lp3Core\App\Http\UseCases\Destination;

use Illuminate\Database\Eloquent\Collection;
use Services\Lp3Core\App\Models\Destination;

class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(): Collection
    {
        return Destination::with('country')->get();
    }
}
