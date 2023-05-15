<?php

namespace Services\Lp3Ship\App\Http\UseCases\ShipCompany;

use Illuminate\Database\Eloquent\Collection;
use Services\Lp3Ship\App\Models\ShipCompany;

class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data): Collection
    {
        $query = ShipCompany::query()->with('country');
        if (isset($data['keyword'])) {
            $query->whereKeyWordSearch($data['keyword']);
        }
        $shipCompany = $query->get();

        return $shipCompany;
    }
}
