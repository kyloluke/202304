<?php

namespace Services\Lp3Core\App\Http\UseCases\InspectionType;

use Services\Lp3Core\App\Models\InspectionType;
use Illuminate\Database\Eloquent\Collection;

/**
 * 検査種別のCSVダウンロード
 */
class CsvDownload
{
    /**
     * 関数呼び出し
     * @param array $id
     * @param String $name
     * @param String $order
     */
    public function __invoke(array $id = NULL, String $name = NULL, $order = NULL): Collection
    {
        $builder = InspectionType::query();

        if (!is_null($id)) {
            $builder->whereIn('id', $id);
        }
        if (!is_null($name)) {
            $builder->where('name', "LIKE", "%".$name."%");
        }

        $orderArr = [
            'id' => 'id',
            'name' => 'name',
        ];

        $sort = 'id';
        $orderby = 'asc';

        if (!is_null($order) && substr($order, 0, 1) != '-'){
            $sort = $orderArr[$order];
        } elseif (!is_null($order) && substr($order, 0, 1) == '-'){
            $sort = $orderArr[substr($order, 1)];// 先頭から1文字を削除
            $orderby = 'desc';
        }

        $inspectionTypes = $builder->orderBy($sort, $orderby)->get();

        return $inspectionTypes;
    }
}
