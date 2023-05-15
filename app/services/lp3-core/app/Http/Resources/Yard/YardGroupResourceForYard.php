<?php

namespace Services\Lp3Core\App\Http\Resources\Yard;

use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Http\Resources\Resource as BaseResource;

/**
 * ヤード用のヤードグループリソース
 */
class YardGroupResourceForYard extends BaseResource
{
    public function toArray($request)
    {
        // デフォルト作業所を業態別に組み換え
        // ※mapを使用すると、該当しない場合にnullとして値が配列に入ってしまうため、余計なnullを配列に入れないためにこのような処置をしております。
        $defaultCustomBrokerOffices = [];
        $defaultCargoLoaderOffices = [];
        $defaultStockManagerOffices = [];
        $defaultWarehouseOwnerOffices = [];
        $defaultDrayagerOffices = [];
        foreach ($this->officeBusinessTypes as $officeBusinessType) {
            $officeResource = [
                'id' => $officeBusinessType->office->id,
                'name' => $officeBusinessType->office->name,
                'status' => $officeBusinessType->office->status
            ];
            switch ($officeBusinessType->business_type) {
                case BusinessType::CUSTOM_BROKER->value:
                    $defaultCustomBrokerOffices[] = $officeResource;
                    break;
                case BusinessType::CARGO_LOADER->value:
                    $defaultCargoLoaderOffices[] = $officeResource;
                    break;
                case BusinessType::STOCK_MANAGER->value:
                    $defaultStockManagerOffices[] = $officeResource;
                    break;
                case BusinessType::WAREHOUSE_OWNER->value:
                    $defaultWarehouseOwnerOffices[] = $officeResource;
                    break;
                case BusinessType::DRAYAGER->value:
                    $defaultDrayagerOffices[] = $officeResource;
                    break;
            }
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'representativeYard' => !empty($this->representativeYard) ? [
                'id' => $this->representativeYard->id,
                'name' => $this->representativeYard->name_jp,
            ] : null,
            'receptionTimeWeekdaysFrom' => $this->reception_time_weekdays_from,
            'receptionTimeWeekdaysTo' => $this->reception_time_weekdays_to,
            'receptionTimeSaturdayFrom' => $this->reception_time_saturday_from,
            'receptionTimeSaturdayTo' => $this->reception_time_saturday_to,
            'restTimeFrom' => $this->rest_time_from,
            'restTimeTo' => $this->rest_time_to,
            'regularHolidays' => $this->regularHolidays->map(function ($regularHoliday) {
                return [
                    'id' => $regularHoliday->id,
                    'startDate' => $regularHoliday->start_date,
                    'endDate' => $regularHoliday->end_date,
                    'mondayFlg' => $regularHoliday->monday_flg,
                    'tuesdayFlg' => $regularHoliday->tuesday_flg,
                    'wednesdayFlg' => $regularHoliday->wednesday_flg,
                    'thursdayFlg' => $regularHoliday->thursday_flg,
                    'fridayFlg' => $regularHoliday->friday_flg,
                    'saturdayFlg' => $regularHoliday->saturday_flg,
                    'sundayFlg' => $regularHoliday->sunday_flg,
                    'nationalHolidaysFlg' => $regularHoliday->national_holidays_flg,
                ];
            }),
            'irregularHolidays' => $this->irregularHolidays->map(function ($irregularHoliday) {
                return [
                    'id' => $irregularHoliday->id,
                    'date' => $irregularHoliday->date
                ];
            }),
            'irregularBusinessDays' => $this->irregularBusinessDays->map(function ($irregularBusinessDay) {
                return [
                    'id' => $irregularBusinessDay->id,
                    'date' => $irregularBusinessDay->date
                ];
            }),
            'defaultPol' => !empty($this->defaultPol) ? [
                'id' => $this->defaultPol->id,
                'name' => $this->defaultPol->name,
            ] : null,
            'defaultCustomBrokerOffices' => $defaultCustomBrokerOffices,
            'defaultCargoLoaderOffices' => $defaultCargoLoaderOffices,
            'defaultStockManagerOffices' => $defaultStockManagerOffices,
            'defaultWarehouseOwnerOffices' => $defaultWarehouseOwnerOffices,
            'defaultDrayagerOffices' => $defaultDrayagerOffices,
            'managers' => $this->managers->map(function ($manager) {
                return [
                    'id' => $manager->id,
                    'name' => $manager->name
                ];
            }),
        ];
    }
}
