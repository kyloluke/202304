<?php

namespace Services\Lp3Core\App\Http\UseCases\YardGroup;

use Illuminate\Support\Facades\DB;
use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Exceptions\YardGroupSaveException;
use Services\Lp3Core\App\Models\OfficeBusinessTypes;
use Services\Lp3Core\App\Models\YardGroup;
use Services\Lp3Core\App\Models\YardGroupIrregularBusinessDays;
use Services\Lp3Core\App\Models\YardGroupIrregularHolidays;
use Services\Lp3Core\App\Models\YardGroupRegularHolidays;

/**
 * ヤードグループの作成
 */
class Store
{
    /**
     * 関数呼び出し
     * 
     * @param array<string mixed> $requestData
     */
    public function __invoke($requestData): YardGroup
    {

        return DB::transaction(function () use ($requestData) {
            $yardGroup = new YardGroup();
            $yardGroup->name = $requestData["name"];

            $yardGroup->representative_yard_id = $requestData["representativeYardId"];
            $yardGroup->reception_time_weekdays_from = $requestData["receptionTimeWeekdaysFrom"];
            $yardGroup->reception_time_weekdays_to = $requestData["receptionTimeWeekdaysTo"];
            $yardGroup->reception_time_saturday_from = $requestData["receptionTimeSaturdayFrom"];
            $yardGroup->reception_time_saturday_to = $requestData["receptionTimeSaturdayTo"];
            $yardGroup->rest_time_from = $requestData["restTimeFrom"];
            $yardGroup->rest_time_to = $requestData["restTimeTo"];
            $yardGroup->default_pol_id = $requestData["defaultPolId"];

            $yardGroup->save();

            // yard_group_office_business_typeテーブルへの保存
            // requestの内容を基に、office_business_typesテーブルから各業態-作業所の組み合わせのIdを取得する
            $query = OfficeBusinessTypes::query();

            $query->orWhere(function ($query) use ($requestData) {
                $query->where("business_type", BusinessType::CUSTOM_BROKER->value);
                $query->whereIn("office_id", $requestData["defaultCustomBrokerOfficeIds"]);
                return $query;
            });
            $query->orWhere(function ($query) use ($requestData) {
                $query->where("business_type", BusinessType::CARGO_LOADER->value);
                $query->whereIn("office_id", $requestData["defaultCargoLoaderOfficeIds"]);
                return $query;
            });
            $query->orWhere(function ($query) use ($requestData) {
                $query->where("business_type", BusinessType::STOCK_MANAGER->value);
                $query->whereIn("office_id", $requestData["defaultStockManagerOfficeIds"]);
                return $query;
            });
            $query->orWhere(function ($query) use ($requestData) {
                $query->where("business_type", BusinessType::WAREHOUSE_OWNER->value);
                $query->whereIn("office_id", $requestData["defaultWarehouseOwnerOfficeIds"]);
                return $query;
            });
            $query->orWhere(function ($query) use ($requestData) {
                $query->where("business_type", BusinessType::DRAYAGER->value);
                $query->whereIn("office_id", $requestData["defaultDrayagerOfficeIds"]);
                return $query;
            });

            $officeBusinessTypesIds = $query->get()->pluck('id');
            $yardGroup->officeBusinessTypes()->syncWithoutDetaching($officeBusinessTypesIds);

            // yard_group_mangersテーブルの更新
            $yardGroup->managers()->syncWithoutDetaching($requestData["managerIds"]);

            // yard_group_regular_holidaysテーブルへの更新
            // 有効期限開始日がなくて、曜日フラグがあるというケースはrequestのvalidationで弾かれている前提
            $yardGroupRegularHolidaysModels = [];
            $emptyEndDateCount = 0;
            for ($i = 0; $i < count($requestData["regularHolidays"]); $i++) {
                $regularHoliday = $requestData["regularHolidays"][$i];

                $yardGroupRegularHolidaysModel = new YardGroupRegularHolidays();
                $yardGroupRegularHolidaysModel->start_date = $regularHoliday["startDate"];

                if (count($requestData["regularHolidays"]) > 1) {
                    // 複数の休日を設定する場合は、有効期限が適切か確認する。
                    if (!is_null($regularHoliday["endDate"])) {
                        $yardGroupRegularHolidaysModel->end_date = $regularHoliday["endDate"];
                    } else {
                        $emptyEndDateCount++;
                        // 有効期限終了日が空である連想配列が、2つ以上ある場合は例外を発生させる。
                        if ($emptyEndDateCount > 1) {
                            throw new YardGroupSaveException(YardGroupSaveException::END_DATE_ERROR);
                        }
                    }

                    // 有効期限開始日 が 1つ前の配列の有効期限終了日＋１日でない場合は例外を発生させる。
                    if (
                        $i > 0 &&
                        $yardGroupRegularHolidaysModel->start_date != date('Y-m-d H:i:s', strtotime($requestData["regularHolidays"][$i - 1]["endDate"] . '+1 day'))
                    ) {
                        throw new YardGroupSaveException(YardGroupSaveException::START_DATE_ERROR);
                    }
                }
                $yardGroupRegularHolidaysModel->monday_flg = $regularHoliday["mondayFlg"];
                $yardGroupRegularHolidaysModel->tuesday_flg = $regularHoliday["tuesdayFlg"];
                $yardGroupRegularHolidaysModel->wednesday_flg = $regularHoliday["wednesdayFlg"];
                $yardGroupRegularHolidaysModel->thursday_flg = $regularHoliday["thursdayFlg"];
                $yardGroupRegularHolidaysModel->friday_flg = $regularHoliday["fridayFlg"];
                $yardGroupRegularHolidaysModel->saturday_flg = $regularHoliday["saturdayFlg"];
                $yardGroupRegularHolidaysModel->sunday_flg = $regularHoliday["sundayFlg"];
                $yardGroupRegularHolidaysModel->national_holidays_flg = $regularHoliday["nationalHolidaysFlg"];

                $yardGroupRegularHolidaysModels[] = $yardGroupRegularHolidaysModel;
            }
            $yardGroup->regularHolidays()->saveMany($yardGroupRegularHolidaysModels);


            // yard_group_irregular_holidaysテーブルへの更新
            $yardGroupIrregularHolidaysModels = [];
            foreach ($requestData["irregularHolidays"] as $irregularHoliday) {
                $yardGroupIrregularHolidaysModel = new YardGroupIrregularHolidays();
                $yardGroupIrregularHolidaysModel->date = $irregularHoliday;
                $yardGroupIrregularHolidaysModels[] = $yardGroupIrregularHolidaysModel;
            }
            $yardGroup->irregularHolidays()->saveMany($yardGroupIrregularHolidaysModels);


            // yard_group_irregular_business_daysテーブルへの更新
            $yardGroupIrregularBusinessDaysModels = [];
            foreach ($requestData["irregularBusinessDays"] as $irregularBusinessDay) {
                $yardGroupIrregularBusinessDaysModel = new YardGroupIrregularBusinessDays();
                $yardGroupIrregularBusinessDaysModel->date = $irregularBusinessDay;
                $yardGroupIrregularBusinessDaysModels[] = $yardGroupIrregularBusinessDaysModel;
            }
            $yardGroup->irregularBusinessDays()->saveMany($yardGroupIrregularBusinessDaysModels);

            $yardGroup->refresh();
            return $yardGroup;
        });
    }
}
