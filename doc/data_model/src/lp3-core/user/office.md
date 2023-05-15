### office / 事業所 モデル

ドメインモデル Office を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity office extends data_model {
    name_ja : string()                                                      # 名称_日本語
    name_en : string()                                                      # 名称_英語
    remarks : text(nullable)                                                # 備考
    status : enum(office_Status) , (default = 1)                            # ステータス
    country_id : bigInteger(nullable, foreign key = countries.id)           # 国Id
    zip_code : string(nullable)                                             # 郵便番号
    state_jp : string(nullable)                                             # 州_日本語
    state_en : string(nullable)                                             # 州_英語
    city_jp : string(nullable)                                              # 市_日本語
    city_en : string(nullable)                                              # 市_英語
    address1_jp : string(nullable)                                          # 住所1_日本語
    address1_en : string(nullable)                                          # 住所1_英語
    address2_jp : string(nullable)                                          # 住所2_日本語
    address2_en : string(nullable)                                          # 住所2_英語
    address3_jp : string(nullable)                                          # 住所3_日本語
    address3_en : string(nullable)                                          # 住所3_英語
    timezone : string(nullable, enum(time_zone))                            # タイムゾーン
    organization_id : bigInteger(nullable, foreign key = organizations.id)  # 所属先組織Id(ドメインモデル：Organizationにて使用)
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity office_business_types extends office {
    office_id : integer(foreign key = offices.id)  # 事業所Id
    business_type : enum(business_type)            # 業態
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity office_mails extends office {
    office_id : integer(foreign key = offices.id) # 事業所Id
    mail : string()                               # メールアドレス
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity office_telephones extends office {
    office_id : integer(foreign key = offices.id) # 事業所Id
    telephone : string()                          # 電話番号
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity office_faxes extends office {
    office_id : integer(foreign key = offices.id) # 事業所Id
    fax : string()                                # fax番号
}
```

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity office_notification_settings extends office {
    office_id : integer(foreign key = offices.id) # 事業所Id
    notification_type : enum(notification)       # 通知設定
    mail : string()                               # メールアドレス
}
```

## テーブル

offices テーブルに格納する。<br>
業態に関しては、office_business_types テーブルに保存する。<br>
メールアドレスに関しては、office_mails テーブルに保存する。<br>
電話番号に関しては、office_telephones テーブルに保存する。<br>
fax 番号に関しては、office_faxes テーブルに保存する。<br>
通知設定に関しては、office_notification_settings テーブルに保存する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

### office_Status 列挙値

列挙型 OfficeStatus を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum OfficeStatus {
   ENABLE = 1   # 有効
   DISABLE = 2  # 無効
}
```

#### 値

列挙型 OfficeStatus の各フィールドに対応する値を定義する。

### notification 列挙値

列挙型 Notification を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum Notification {
    CONTAINER_PHOTO = 1    # コンテナ写真
    DOCK_RECEIPT = 2       # DR
    SHIPPING_ORDER = 3     # SO
    EXPORT_DECLARATION = 4 # ED
}
```

#### 値

列挙型 Notification の各フィールドに対応する値を定義する。
