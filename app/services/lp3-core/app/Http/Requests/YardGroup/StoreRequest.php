<?php

namespace Services\Lp3Core\App\Http\Requests\YardGroup;

use App\Http\Requests\Traits\ScribeBodyParametersHelper;
use Illuminate\Validation\Rule;
use Services\Lp3Core\App\Enums\BusinessType;
use Services\Lp3Core\App\Http\Requests\Request;
use Services\Lp3Core\App\Models\Location;

/**
 * ヤードグループの作成リクエスト
 */
class StoreRequest extends Request
{
    use ScribeBodyParametersHelper;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'representativeYardId' => ['nullable', 'integer', Rule::exists('yards', 'id')], // @todo：後ほど独自Ruleに置き換える
            'receptionTimeWeekdaysFrom' => ['nullable', 'date_format:H:i'],
            'receptionTimeWeekdaysTo' => ['nullable', 'date_format:H:i'],
            'receptionTimeSaturdayFrom' => ['nullable', 'date_format:H:i'],
            'receptionTimeSaturdayTo' => ['nullable', 'date_format:H:i'],
            'restTimeFrom' => ['nullable', 'date_format:H:i'],
            'restTimeTo' => ['nullable', 'date_format:H:i'],
            'defaultPolId' => ['nullable', 'integer', Rule::exists(Location::class, 'id')], // @todo：後ほど独自Ruleに置き換える
            'defaultCustomBrokerOfficeIds' => ['nullable', 'array'],
            'defaultCargoLoaderOfficeIds' => ['nullable', 'array'],
            'defaultStockManagerOfficeIds' => ['nullable', 'array'],
            'defaultWarehouseOwnerOfficeIds' => ['nullable', 'array'],
            'defaultDrayagerOfficeIds' => ['nullable', 'array'],
            'defaultCustomBrokerOfficeIds.*' => [
                'nullable',
                'integer',
                Rule::exists('offices', 'id'), // @todo：後ほど独自Ruleに置き換える
                // 指定された作業所（office）の業態が、通関業者であるかチェック
                Rule::exists('office_business_types', 'office_id')
                    ->where(function ($query) {
                        $query->where('business_type', BusinessType::CUSTOM_BROKER->value);
                    }),
            ],
            'defaultCargoLoaderOfficeIds.*' => [
                'nullable',
                'integer',
                Rule::exists('offices', 'id'), // @todo：後ほど独自Ruleに置き換える
                // 指定された作業所（office）の業態が、船積作業会社であるかチェック
                Rule::exists('office_business_types', 'office_id')
                    ->where(function ($query) {
                        $query->where('business_type', BusinessType::CARGO_LOADER->value);
                    }),

            ],
            'defaultStockManagerOfficeIds.*' => [
                'nullable',
                'integer',
                Rule::exists('offices', 'id'), // @todo：後ほど独自Ruleに置き換える
                // 指定された作業所（office）の業態が、在庫管理会社であるかチェック
                Rule::exists('office_business_types', 'office_id')
                    ->where(function ($query) {
                        $query->where('business_type', BusinessType::STOCK_MANAGER->value);
                    }),
            ],
            'defaultWarehouseOwnerOfficeIds.*' => [
                'nullable',
                'integer',
                Rule::exists('offices', 'id'), // @todo：後ほど独自Ruleに置き換える
                // 指定された作業所（office）の業態が、蔵主であるかチェック
                Rule::exists('office_business_types', 'office_id')
                    ->where(function ($query) {
                        $query->where('business_type', BusinessType::WAREHOUSE_OWNER->value);
                    }),
            ],
            'defaultDrayagerOfficeIds.*' => [
                'nullable',
                'integer',
                Rule::exists('offices', 'id'), // @todo：後ほど独自Ruleに置き換える
                // 指定された作業所（office）の業態が、ドレー業者であるかチェック
                Rule::exists('office_business_types', 'office_id')
                    ->where(function ($query) {
                        $query->where('business_type', BusinessType::DRAYAGER->value);
                    }),
            ],
            'managerIds' => ['nullable', 'array'],
            'managerIds.*' => ['nullable', 'integer', Rule::exists('users', 'id')], // @todo：後ほど独自Ruleに置き換える
            'regularHolidays' => ['nullable', 'array'],
            'regularHolidays.*.startDate' => [
                'nullable', 'date_format:Y-m-d H:i:s', 'after:today',
            ],
            'regularHolidays.*.endDate' => [
                'nullable', 'date_format:Y-m-d H:i:s', 'after:today', 'after:regularHolidays.*.startDate'
            ],
            'regularHolidays.*.mondayFlg' => ['nullable', 'boolean'],
            'regularHolidays.*.tuesdayFlg' => ['nullable', 'boolean'],
            'regularHolidays.*.wednesdayFlg' => ['nullable', 'boolean'],
            'regularHolidays.*.thursdayFlg' => ['nullable', 'boolean'],
            'regularHolidays.*.fridayFlg' => ['nullable', 'boolean'],
            'regularHolidays.*.saturdayFlg' => ['nullable', 'boolean'],
            'regularHolidays.*.sundayFlg' => ['nullable', 'boolean'],
            'regularHolidays.*.nationalHolidaysFlg' => ['nullable', 'boolean'],
            'irregularHolidays' => ['nullable', 'array'],
            'irregularHolidays.*' => ['nullable', 'date_format:Y-m-d H:i:s', 'after:today', 'different:irregularBusinessDays.*'],
            'irregularBusinessDays' => ['nullable', 'array'],
            'irregularBusinessDays.*' => ['nullable', 'date_format:Y-m-d H:i:s', 'after:today', 'different:irregularHolidays.*'],
        ];
    }

    /**
     * @see ScribeQueryParametersHelper::bodyParameters()
     *
     * @return array<string, mixed>
     */
    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => "代表ヤード名",
                'example' => "テストヤード"
            ],
            'representativeYardId' => [
                'description' => "代表ヤードId",
                'example' => 1
            ],
            'receptionTimeWeekdaysFrom' => [
                'description' => "平日搬入受付時刻_From",
                'example' => "10:00"
            ],
            'receptionTimeWeekdaysTo' => [
                'description' => "平日搬入受付時刻_To",
                'example' => "19:00"
            ],
            'receptionTimeSaturdayFrom' => [
                'description' => "土曜日搬入受付時刻_From",
                'example' => "10:00"
            ],
            'receptionTimeSaturdayTo' => [
                'description' => "土曜日搬入受付時刻_To",
                'example' => "19:00"
            ],
            'restTimeFrom' => [
                'description' => "搬入受付休憩時刻_From",
                'example' => "12:00"
            ],
            'restTimeTo' => [
                'description' => "搬入受付休憩時刻_To",
                'example' => "13:00"
            ],
            'defaultPolId' => [
                'description' => "デフォルト積港Id",
                'example' => 100
            ],
            'defaultCustomBrokerOfficeIds' => [
                'description' => "デフォルト通関業者Ids",
            ],
            'defaultCustomBrokerOfficeIds.*' => [
                'description' => "デフォルト通関業者Id",
                'example' => 1
            ],
            'defaultCargoLoaderOfficeIds' => [
                'description' => "デフォルト船積作業会社Ids",
            ],
            'defaultCargoLoaderOfficeIds.*' => [
                'description' => "デフォルト船積作業会社Id",
                'example' => 1
            ],
            'defaultStockManagerOfficeIds' => [
                'description' => "デフォルト在庫管理会社Ids",
            ],
            'defaultStockManagerOfficeIds.*' => [
                'description' => "デフォルト在庫管理会社Id",
                'example' => 1
            ],
            'defaultWarehouseOwnerOfficeIds' => [
                'description' => "デフォルト蔵主Ids",
            ],
            'defaultWarehouseOwnerOfficeIds.*' => [
                'description' => "デフォルト蔵主Id",
                'example' => 1
            ],
            'defaultDrayagerOfficeIds' => [
                'description' => "デフォルトドレー業者Ids",
            ],
            'defaultDrayagerOfficeIds.*' => [
                'description' => "デフォルトドレー業者Id",
                'example' => 1
            ],
            'managerIds' => [
                'description' => "管理担当者のIds",
            ],
            'managerIds.*' => [
                'description' => "管理担当者のId",
                'example' => 1
            ],
            'regularHolidays' => [
                'description' => "定休日の設定",
            ],
            'regularHolidays.*.id' => [
                'description' => "定休日-ヤードグループの関連id(id = ''は新規登録とみなす)",
                'example' => 1
            ],
            'regularHolidays.*.startDate' => [
                'description' => "定休日の有効期限開始日",
                'example' => '2022-01-01 00:00:00'
            ],
            'regularHolidays.*.endDate' => [
                'description' => "定休日の有効期限終了日",
                'example' => '2022-12-31 00:00:00'
            ],
            'regularHolidays.*.mondayFlg' => [
                'description' => "定休日の月曜日使用フラグ",
                'example' => true
            ],
            'regularHolidays.*.tuesdayFlg' => [
                'description' => "定休日の火曜日使用フラグ",
                'example' => true
            ],
            'regularHolidays.*.wednesdayFlg' => [
                'description' => "定休日の水曜日使用フラグ",
                'example' => true
            ],
            'regularHolidays.*.thursdayFlg' => [
                'description' => "定休日の木曜日使用フラグ",
                'example' => true
            ],
            'regularHolidays.*.fridayFlg' => [
                'description' => "定休日の金曜日使用フラグ",
                'example' => true
            ],
            'regularHolidays.*.saturdayFlg' => [
                'description' => "定休日の土曜日使用フラグ",
                'example' => true
            ],
            'regularHolidays.*.sundayFlg' => [
                'description' => "定休日の日曜日使用フラグ",
                'example' => true
            ],
            'regularHolidays.*.nationalHolidaysFlg' => [
                'description' => "定休日の祝日使用フラグ",
                'example' => true
            ],
            'irregularHolidays' => [
                'description' => "臨時休業日",
            ],
            'irregularHolidays.*' => [
                'description' => "臨時休業日の日付",
                'example' => '2022-01-01 00:00:00'
            ],
            'irregularBusinessDays' => [
                'description' => "臨時営業日",
            ],
            'irregularBusinessDays.*' => [
                'description' => "臨時営業日の日付",
                'example' => '2022-05-04 00:00:00'
            ],
        ];
    }

    public function makeArraysForUseCase()
    {
        $regularHolidays = isset($this->regularHolidays) ? array_map(function ($regularHoliday) {
            return [
                'startDate' => $regularHoliday['startDate'],
                'endDate' => isset($regularHoliday['endDate']) ? $regularHoliday['endDate'] : null,
                'mondayFlg' => isset($regularHoliday['mondayFlg']) ? $regularHoliday['mondayFlg'] : false,
                'tuesdayFlg' => isset($regularHoliday['tuesdayFlg']) ? $regularHoliday['tuesdayFlg'] : false,
                'wednesdayFlg' => isset($regularHoliday['wednesdayFlg']) ? $regularHoliday['wednesdayFlg'] : false,
                'thursdayFlg' => isset($regularHoliday['thursdayFlg']) ? $regularHoliday['thursdayFlg'] : false,
                'fridayFlg' => isset($regularHoliday['fridayFlg']) ? $regularHoliday['fridayFlg'] : false,
                'saturdayFlg' => isset($regularHoliday['saturdayFlg']) ? $regularHoliday['saturdayFlg'] : false,
                'sundayFlg' => isset($regularHoliday['sundayFlg']) ? $regularHoliday['sundayFlg'] : false,
                'nationalHolidaysFlg' => isset($regularHoliday['nationalHolidaysFlg']) ? $regularHoliday['nationalHolidaysFlg'] : false,
            ];
        }, $this->regularHolidays) : [];

        return [
            'name' => isset($this->name) ? $this->name : null,
            'representativeYardId' => isset($this->representativeYardId) ? $this->representativeYardId : null,
            'receptionTimeWeekdaysFrom' => isset($this->receptionTimeWeekdaysFrom) ? $this->receptionTimeWeekdaysFrom : null,
            'receptionTimeWeekdaysTo' => isset($this->receptionTimeWeekdaysTo) ? $this->receptionTimeWeekdaysTo : null,
            'receptionTimeSaturdayFrom' => isset($this->receptionTimeSaturdayFrom) ? $this->receptionTimeSaturdayFrom : null,
            'receptionTimeSaturdayTo' => isset($this->receptionTimeSaturdayTo) ? $this->receptionTimeSaturdayTo : null,
            'restTimeFrom' => isset($this->restTimeFrom) ? $this->restTimeFrom : null,
            'restTimeTo' => isset($this->restTimeTo) ? $this->restTimeTo : null,
            'defaultPolId' => isset($this->defaultPolId) ? $this->defaultPolId : null,
            'defaultCustomBrokerOfficeIds' => isset($this->defaultCustomBrokerOfficeIds) ? $this->defaultCustomBrokerOfficeIds : [],
            'defaultCargoLoaderOfficeIds' => isset($this->defaultCargoLoaderOfficeIds) ? $this->defaultCargoLoaderOfficeIds : [],
            'defaultStockManagerOfficeIds' => isset($this->defaultStockManagerOfficeIds) ? $this->defaultStockManagerOfficeIds : [],
            'defaultWarehouseOwnerOfficeIds' => isset($this->defaultWarehouseOwnerOfficeIds) ? $this->defaultWarehouseOwnerOfficeIds : [],
            'defaultDrayagerOfficeIds' => isset($this->defaultDrayagerOfficeIds) ? $this->defaultDrayagerOfficeIds : [],
            'managerIds' => isset($this->managerIds) ? $this->managerIds : [],
            'regularHolidays' => $regularHolidays,
            'irregularHolidays' => isset($this->irregularHolidays) ? $this->irregularHolidays : [],
            'irregularBusinessDays' => isset($this->irregularBusinessDays) ? $this->irregularBusinessDays : [],
        ];
    }
}
