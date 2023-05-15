### yard / ヤード モデル

ドメインモデル Yard を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yards extends data_model {
    name_jp : string()                                                      # 名称_日本語
    name_en : string()                                                      # 名称_英語
    country_id : integer(nullable, foreign key = countries.id)              # 国Id
    zipcode : string(nullable)                                              # 郵便番号
    state_jp string(nullable)                                               # 州_日本語
    state_en string(nullable)                                               # 州_英語
    city_jp : string(nullable)                                              # 市_日本語
    city_en : string(nullable)                                              # 市_英語
    address1_jp : string(nullable)                                          # 住所1_日本語
    address2_jp : string(nullable)                                          # 住所2_日本語
    address3_jp : string(nullable)                                          # 住所3_日本語
    address1_en : string(nullable)                                          # 住所1_英語
    address2_en : string(nullable)                                          # 住所2_英語
    address3_en : string(nullable)                                          # 住所3_英語
    timezone : string(nullable, enum(time_zone))                            # タイムゾーン
    naccs_bonded_area_code : string(nullable)                               # 保税地域コード
    mail: string(nullable)                                                  # メールアドレス
    telephone: string(nullable)                                             # 電話番号
    person_in_charge_jp : string(nullable)                                  # 担当者_日本語
    person_in_charge_en : string(nullable)                                  # 担当者_英語
    capacity : integer(nullable)                                            # キャパシティ
    cc_when_carry_in_cy : boolean                                           # CY搬入時通関済みフラグ
    name_web : string(nullable)                                             # HP名称
    map_url_web : string(nullable)                                          # 地図URL
    transport_method_web : string(nullable)                                 # 輸送手段
    status : enum(yard_status)                                              # ヤードステータス
    yard_group_id : integer(foreign key = yard_groups.id)                   # ヤードグループId
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity yard_cargo_type extends yards {
    ※多対多の中間テーブルなので省略
}
```

## テーブル

yards テーブルに格納する。<br>
取扱貨物種類リストに関しては、cargo_types テーブルとの中間テーブルを作成し保存する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

### yard_status 列挙値

列挙型 YardStatus を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum YardStatus {
    ENABLE = 1  # 有効
    DISABLE = 2 # 無効
}
```

#### 値

列挙型 YardStatus の各フィールドに対応する値を定義する。
