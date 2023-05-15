### ship_schedule データモデル

ドメインモデル ShipSchedule を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ship_schedules extends data_model {
    ship_id : bigInteger(foreign key = ship.id)                             # 本船
    ship_company_id : bigInteger(foreign key = ship_companies.id)           # 船会社
    voyage_number : string (nullable)                                       # 航海番号
    remarks : string (nullable)                                             # 備考
    refer_url : string (nullable)                                           # 参照URL、船社HP
    type : Integer (nullable)                                               # CONRO船スケジュール種別タイプ
}
```

#### テーブル

ship_schedules テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

### ShipScheduleType / CONRO船スケジュール種別 列挙型

本船のスケジュールはCONRO船の場合、種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ShipScheduleType {
    + CONTAINER_SHIP  # コンテナ船
    + RORO_SHIP       # RORO船
}
```