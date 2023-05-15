<?php

namespace Services\Lp3Core\App\Http\UseCases\Country;

use Services\Lp3Core\App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

/**
 * 国のCSVダウンロード
 */
class CsvDownload
{
    /**
     * 関数呼び出し
     * @param array $id
     * @param String $name
     * @param int $regionId
     * @param String $regionName
     * @param array $requiredInspectionId
     * @param array $requiredInspectionName
     * @param String $order
     */
    public function __invoke(array $id = NULL, String $name = NULL, int $regionId = NULL, String $regionName = NULL, array $requiredInspectionId = NULL, array $requiredInspectionName = NULL, $order = NULL): Collection
    {
        $query = Country::query()->whereHas('region', function ($q) {
            $q->where('regions.deleted_at', "=", NULL);
        });

        if (!is_null($id)) {
            $query->whereIn('countries.id', $id);
        }
        if (!is_null($name)) {
            $query->where('countries.name', "LIKE", "%".$name."%");
        }

        if (!is_null($regionId)) {
            $query->where('countries.region_id', "=", $regionId);
        }
        if (!is_null($regionName)) {
            $query->whereHas('region', function ($q) use($regionName) {
                // regionsテーブルのnameで検索
                $q->where('regions.name', "LIKE", "%".$regionName."%");
            });
        }
        if (!is_null($requiredInspectionId)) {
            $query->whereHas('requiredInspections', function ($q) use($requiredInspectionId) {
                // country_required_inspectionsテーブルのinspection_type_idで検索
                $q->whereIn('country_required_inspections.inspection_type_id', $requiredInspectionId);
            });
        }
        if (!is_null($requiredInspectionName)) {
            $query->whereHas('requiredInspections', function ($q) use($requiredInspectionName) {
                // inspection_typesテーブルのnameで検索
                foreach($requiredInspectionName as $key => $value) {
                    if ($key == 0) {
                        $q->where('inspection_types.name', "LIKE", "%".$requiredInspectionName[$key]."%");
                    } else {
                        $q->orWhere('inspection_types.name', "LIKE", "%".$requiredInspectionName[$key]."%");
                    }
                }
            });
        }

        $orderArr = [
            'id' => 'id',
            'name' => 'name',
            'regionId' => 'region_id',
            'regionName' => 'regions.name',
        ];

        $sort = 'id';
        $orderby = 'asc';

        if (!is_null($order) && substr($order, 0, 1) != '-') {
            $sort = $orderArr[$order];
        } elseif (!is_null($order) && substr($order, 0, 1) == '-') {
            $sort = $orderArr[substr($order, 1)];// 先頭から1文字を削除
            $orderby = 'desc';
        }

        $countries = $query->select('countries.*')->join('regions', 'regions.id', '=', 'countries.region_id')->orderBy($sort, $orderby)->get();

        return $countries;
    }
}
