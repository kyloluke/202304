### ShipSchedule / 本船スケジュール モデル

本船の1回分の航海スケジュールを表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ShipSchedule implements DomainModel {
    + Ship ship                 # 本船
    + ShipCompany shipCompany   # 船会社
    + String voyageNumber       # 航海番号
    + ShipScheduleItem[] items  # スケジュール明細リスト
    + File[] attachedFiles      # 添付ファイルリスト
    + String remarks            # 備考
    + URL referUrl              # 参照URL
    + ShipScheduleType type     # 本船スケジュールタイプ
}
```

### ShipScheduleType / 本船スケジュール種別 列挙型

本船のスケジュール種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ShipScheduleType {
    + CONTAINER_SHIP  # コンテナ船
    + RORO_SHIP       # RORO船
}
```

#### プロパティ

ship / 本船
: 本船。

shipCompany / 船会社
: 本船の船会社。
船会社と船舶の関係性は動的であり、1つの船舶を複数の船会社で所有するケースや、船舶の所有権が別の船会社に移るケースがある。  
そのためLP3では本船スケジュールごとに船会社と船舶を結びつけて保持する。

voyageNumber / 航海番号
: 航海番号。

items / スケジュール明細リスト
: スケジュール明細のリスト。

attachedFiles / 添付ファイルリスト
: 添付されたファイルのリスト。

remarks / 備考
: 任意の備考文章。

referUrl / 参照URL
: スケジュール情報が載っているWebサイトのURL。

ShipScheduleType
: 本船スケジュールの種別タイプ