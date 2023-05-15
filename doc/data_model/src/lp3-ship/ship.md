### ship データモデル

ドメインモデル Ship を永続化するためのデータモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

entity ship extends data_model {
    name : string(maxLength = 50)
    type : enum(ship_type)
}
```

#### テーブル

ships テーブルに格納する。

#### カラム

ドメインモデルの各プロパティに対応するカラムを保持する。

### ship_type 列挙値

列挙型 ShipType を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ShipType {
    CONTAINER_SHIP = 1 # コンテナ船
    RORO_SHIP = 2      # RORO船
    CONRO_SHIP = 3     # ConRO船
}
```

#### 値

列挙型 ShipType の各フィールドに対応する値を定義する。
