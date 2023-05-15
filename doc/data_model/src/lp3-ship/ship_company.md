### ship_company データモデル

ドメインモデル ShipCompany を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ship_company extends data_model {
    name : string(max:50)                                       # 船会社名
    scac_code : string(nullable, max:50)                        # 会社識別コード
    mail : string (nullable)                                    # メールアドレス
    remarks : text (nullable)                                   # 備考
    country_id : integer(nullable, foreign key = countries.id)  # 国Id
    zip_code : string(nullable, max:50)                         # 郵便番号
    state_jp : string(nullable, max:50)                         # 州_日本語
    state_en : string(nullable, max:50)                         # 州_英語
    city_jp : string(nullable, max:50)                          # 市_日本語
    city_en : string(nullable, max:50)                          # 市_英語
    address1_jp : string(nullable, max:120)                     # 住所1_日本語
    address2_jp : string(nullable, max:120)                     # 住所2_日本語
    address3_jp : string(nullable, max:120)                     # 住所3_日本語
    address1_en : string(nullable, max:120)                     # 住所1_英語
    address2_en : string(nullable, max:120)                     # 住所2_英語
    address3_en : string(nullable, max:120)                     # 住所3_英語
    timezone : string(nullable, enum(time_zone))                # タイムゾーン
}
```

#### テーブル

ship_companies テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。
