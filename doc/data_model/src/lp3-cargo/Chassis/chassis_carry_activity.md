### chassis_carry_activity / 車輌アクティビティ

ドメインモデル ChassisCarryActivity を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class chassis_carry_activities implements data_model {
    chassis_id : bigInteger(foreign key = chassis.id)            # 貨物、外部キー
    prospect : bool(nullable)                                    # 予定フラグ
    act_at : datetime(nullable)                                  # 活動日時
    author_id : bigInteger(nullable, foreign key = users.id)     # 作成者、外部キー
    auth_at : datetime(nullable)                                 # 作成日時
    remarks : string(nullable)                                   # 備考
    admin_remarks : string(nullable)                             # 管理用備考
    grouping_value : int(nullable)                               # グルーピング値
    yard_id : bigInteger(foreign key = yards.id)                 # ヤード、外部キー  
    type : tinyInt(nullable, enum(ChassisCarryType))             # 種別
}
```

## テーブル

chassis_carry_activities テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

### ChassisCarryType / 車輌搬入出種別 列挙型

列挙型 ChassisCarryType を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ChassisCarryType {
    + CARRY_IN          = 1      # 搬入（通常の搬入、内貨搬入、一時搬出戻りを含む）
    + DOMESTIC_OUT      = 2      # 内貨搬出
    + DOMESTIC_RETURN   = 3      # 内貨戻し
    + TEMP_OUT          = 4      # 一時搬出
    + CARRY_OUT         = 5      # 搬出（外貨搬出、GODOWNの間も含む、本船スケジュールによる推定で生成されるアクティブ）
}
```

#### 値

列挙型 ChassisCarryType の各フィールドに対応する値を定義する。