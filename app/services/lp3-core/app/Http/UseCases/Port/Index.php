<?php

namespace Services\Lp3Core\App\Http\UseCases\Port;

use Illuminate\Database\Eloquent\Collection;
use Services\Lp3Core\App\Models\Port;

class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(): Collection
    {
        return Port::with('country')->get();
    }
}
