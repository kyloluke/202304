### yard_group / ヤードグループ モデル

ドメインモデル YardGroup を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yard_groups extends data_model {
    name : string()                                                       # 名称
    representative_yard_id(foreign key = yards.id), (nullable)            # 代表ヤードId
    reception_time_weekdays_from : string(nullable)                       # 平日搬入受付時刻_from
    reception_time_weekdays_to : string(nullable)                         # 平日搬入受付時刻_to
    reception_time_saturday_from : string(nullable)                       # 土曜日搬入受付時刻_from
    reception_time_saturday_to : string(nullable)                         # 土曜日搬入受付時刻_to
    rest_time_from : string(nullable)                                     # 搬入受付休憩時刻_from
    rest_time_to : string(nullable)                                       # 搬入受付休憩時刻_to
    default_pol_id : integer(nullable, foreign key = ports.id)            # デフォルト積港
    organization_id : bigInteger(nullable, foreign key = organization.id) # 所属組織Id
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yard_group_regular_holidays extends yard_groups {
    yard_group_id : integer(foreign key = yard_group.id)        # ヤードグループId
    start_date : date()                                         # 有効期限開始日
    end_date : date(nullable)                                   # 有効期限終了日
    monday_flg : boolean,                                       # 月曜日フラグ
    tuesday_flg : boolean,                                      # 火曜日フラグ
    wednesday_flg : boolean,                                    # 水曜日フラグ
    thursday_flg : boolean,                                     # 木曜日フラグ
    friday_flg : boolean,                                       # 金曜日フラグ
    saturday_flg : boolean,                                     # 土曜日フラグ
    sunday_flg : boolean,                                       # 日曜日フラグ
    national_holidays_flg : boolean                             # 祝日フラグ
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yard_group_irregular_holidays extends yard_groups {
    yard_group_id : integer(foreign key = yard_group.id)        # ヤードグループId
    date : date()                                               # 臨時休日
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yard_group_irregular_business_days extends yard_groups {
    yard_group_id : integer(foreign key = yard_group.id)        # ヤードグループId
    date : date()                                               # 臨時営業日
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yard_group_office_business_type extends yard_groups {
    ※多対多の中間テーブルなので省略

}
```

## テーブル

yard_groups テーブルに格納する。<br>
定休日に関しては、yard_group_regular_holidays テーブルに保存する。
臨時休日に関しては、yard_group_irregular_holidays テーブルに保存する。<br>
臨時営業日に関しては、yard_group_irregular_business_days テーブルに保存する。<br>
デフォルト作業事業所に関しては、office_business_types テーブルとの中間テーブルを作成し保存する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。
