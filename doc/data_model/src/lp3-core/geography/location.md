### location データモデル

ドメインモデル Location を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity locations extends data_model {
    + name : string                                                     # 名称
    + name_en : string(nullable)                                        # 名称_英語
    + country_id : bigInteger(nullable, foreign key = countries.id)     # 国Id
    + zip_code : string(nullable)                                       # 郵便番号
    + state_jp : string(nullable)                                       # 州_日本語
    + state_en : string(nullable)                                       # 州_英語
    + city_jp : string(nullable)                                        # 市_日本語
    + city_en : string(nullable)                                        # 市_英語
    + address1_jp : string(nullable)                                    # 住所1_日本語
    + address1_en : string(nullable)                                    # 住所1_英語
    + address2_jp : string(nullable)                                    # 住所2_日本語
    + address2_en : string(nullable)                                    # 住所2_英語
    + address3_jp : string(nullable)                                    # 住所3_日本語
    + address3_en : string(nullable)                                    # 住所3_英語
    + unlo_code : string(nullable)                                      # UN/LOコード
    + require_local_agent : bool(default:false)                         # 現地代理店必須フラグ 
    + naccs_code : string(nullable)                                     # NACCSコード
    + timezone : string(nullable, enum(time_zone))                      # タイムゾーン
    + location_type : int(enum(location_type))                          # ロケーション種別　　      
    + type : int(nullable, enum(port_type))                             # 港種別、port専用    
}
```

#### テーブル

locations テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

### location_type 列挙値

列挙型 LocationType を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum LocationType {
    PORT            = 1  # 港
    DESTINSTION     = 2  # 仕向地
}
```

#### 値

列挙型 LocationType の各フィールドに対応する値を定義する。

### port_type 列挙値

列挙型 portType を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum portType {
    POL = 1  # 積港
    POD = 2  # 揚港
}
```

#### 値

列挙型 portType の各フィールドに対応する値を定義する。

