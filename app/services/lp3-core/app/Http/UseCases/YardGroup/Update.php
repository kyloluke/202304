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
 * ヤードグループの更新
 */
class Update
{
    /**
     * 関数呼び出し
     * 
     * @param array<string mixed> $requestData
     * @param int $id
     */
    public function __invoke(YardGroup $targetYardGroup, $requestData): YardGroup
    {
        return DB::transaction(function () use ($targetYardGroup, $requestData) {
            $targetYardGroup->name = $requestData["name"];
            $targetYardGroup->representative_yard_id = $requestData["representativeYardId"];
            $targetYardGroup->reception_time_weekdays_from = $requestData["receptionTimeWeekdaysFrom"];
            $targetYardGroup->reception_time_weekdays_to = $requestData["receptionTimeWeekdaysTo"];
            $targetYardGroup->reception_time_saturday_from = $requestData["receptionTimeSaturdayFrom"];
            $targetYardGroup->reception_time_saturday_to = $requestData["receptionTimeSaturdayTo"];
            $targetYardGroup->rest_time_from = $requestData["restTimeFrom"];
            $targetYardGroup->rest_time_to = $requestData["restTimeTo"];
            $targetYardGroup->default_pol_id = $requestData["defaultPolId"];

            $targetYardGroup->save();

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
            $targetYardGroup->officeBusinessTypes()->sync($officeBusinessTypesIds);

            // yard_group_mangersテーブルの更新
            $targetYardGroup->managers()->sync($requestData["managerIds"]);

            // yard_group_regular_holidaysテーブルへの更新
            // 有効期限開始日がなくて、曜日リストがあるというケースはrequestのvalidationで弾かれている前提
            $yardGroupRegularHolidaysModels = [];
            $emptyEndDateCount = 0;
            for ($i = 0; $i < count($requestData["regularHolidays"]); $i++) {
                $regularHoliday = $requestData["regularHolidays"][$i];

                // yard_group_regular_holidays.idの指定がある場合は更新、ない場合は新規登録と判断する
                $yardGroupRegularHolidaysModel = new YardGroupRegularHolidays();
                if (!is_null($regularHoliday["id"])) {
                    $yardGroupRegularHolidaysModel = YardGroupRegularHolidays::find($regularHoliday["id"]);
                }

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
                $yardGroupRegularHolidaysModel->monday_flg =  $regularHoliday["mondayFlg"];
                $yardGroupRegularHolidaysModel->tuesday_flg =  $regularHoliday["tuesdayFlg"];
                $yardGroupRegularHolidaysModel->wednesday_flg =  $regularHoliday["wednesdayFlg"];
                $yardGroupRegularHolidaysModel->thursday_flg =  $regularHoliday["thursdayFlg"];
                $yardGroupRegularHolidaysModel->friday_flg =  $regularHoliday["fridayFlg"];
                $yardGroupRegularHolidaysModel->saturday_flg =  $regularHoliday["saturdayFlg"];
                $yardGroupRegularHolidaysModel->sunday_flg =  $regularHoliday["sundayFlg"];
                $yardGroupRegularHolidaysModel->national_holidays_flg =  $regularHoliday["nationalHolidaysFlg"];

                $yardGroupRegularHolidaysModels[] = $yardGroupRegularHolidaysModel;
            }
            $targetYardGroup->regularHolidays()->saveMany($yardGroupRegularHolidaysModels);


            // yard_group_irregular_holidaysテーブルへの更新
            $yardGroupIrregularHolidaysModels = [];
            $beforeUpdatingIrregularHolidayIds = $targetYardGroup->irregularHolidays()->pluck('id')->toArray();
            $afterUpdatingIrregularHolidayIds = [];
            foreach ($requestData["irregularHolidays"] as $irregularHoliday) {

                // yard_group_irregular_holidays.idの指定がある場合は更新、ない場合は新規登録と判断する
                $yardGroupIrregularHolidaysModel = new YardGroupIrregularHolidays();
                if (!is_null($irregularHoliday["id"])) {
                    $yardGroupIrregularHolidaysModel = YardGroupIrregularHolidays::find($irregularHoliday["id"]);
                    $afterUpdatingIrregularHolidayIds[] = $irregularHoliday["id"];
                }
                $yardGroupIrregularHolidaysModel->date = $irregularHoliday["date"];
                $yardGroupIrregularHolidaysModels[] = $yardGroupIrregularHolidaysModel;
            }
            $targetYardGroup->irregularHolidays()->saveMany($yardGroupIrregularHolidaysModels);
            $deleteTargetIrregularHolidayIds = array_diff($beforeUpdatingIrregularHolidayIds, $afterUpdatingIrregularHolidayIds);
            $targetYardGroup->irregularHolidays()->whereIn('id', $deleteTargetIrregularHolidayIds)->delete();

            // yard_group_irregular_business_daysテーブルへの更新
            $yardGroupIrregularBusinessDaysModels = [];
            $beforeUpdatingIrregularBusinessDayIds = $targetYardGroup->irregularBusinessDays()->pluck("id")->toArray();
            $afterUpdatingIrregularBusinessDayIds = [];
            foreach ($requestData["irregularBusinessDays"] as $irregularBusinessDay) {

                // yard_group_irregular_business_days.idの指定がある場合は更新、ない場合は新規登録と判断する
                $yardGroupIrregularBusinessDaysModel = new YardGroupIrregularBusinessDays();
                if (!is_null($irregularBusinessDay["id"])) {
                    $yardGroupIrregularBusinessDaysModel = YardGroupIrregularBusinessDays::find($irregularBusinessDay["id"]);
                    $afterUpdatingIrregularBusinessDayIds[] = $irregularBusinessDay["id"];
                }
                $yardGroupIrregularBusinessDaysModel->date = $irregularBusinessDay["date"];
                $yardGroupIrregularBusinessDaysModels[] = $yardGroupIrregularBusinessDaysModel;
            }
            $targetYardGroup->irregularBusinessDays()->saveMany($yardGroupIrregularBusinessDaysModels);
            $deleteTargetIrregularBusinessDayIds = array_diff($beforeUpdatingIrregularBusinessDayIds, $afterUpdatingIrregularBusinessDayIds);
            $targetYardGroup->irregularBusinessDays()->whereIn('id', $deleteTargetIrregularBusinessDayIds)->delete();

            $targetYardGroup->refresh();
            return $targetYardGroup;
        });
    }
}
