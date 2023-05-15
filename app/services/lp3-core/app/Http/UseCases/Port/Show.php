<?php

namespace Services\Lp3Core\App\Http\UseCases\Port;

use Services\Lp3Core\App\Models\Port;

class Show
{
    /**
     * 関数呼び出し
     */
    public function __invoke($id): Port
    {
        $port = Port::findOrFail($id);
        return $port->load('country');
    }
}
