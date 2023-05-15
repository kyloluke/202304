### Ship / 本船 モデル

貨物を運搬する船舶を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Ship implements DomainModel {
    + String name    # 名称
    + ShipType type  # 種別
}
```

#### プロパティ

name / 名称
: 船舶の名称。

type / 種別
: 船舶の種別。


### ShipType / 本船種別 列挙型

本船の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ShipType {
    + CONTAINER_SHIP  # コンテナ船
    + RORO_SHIP       # RORO船
    + CONRO_SHIP      # ConRO船
}
```

#### フィールド

CONTAINER_SHIP / コンテナ船
: 海上コンテナを輸送する貨物船。

RORO_SHIP / RORO船
: 貨物を積んだ車輌ごと輸送する貨物船。roll-on/roll-off ship。

CONRO_SHIP / ConRO船
: コンテナ船とRORO船の両方の機能を持つ貨物船。上部甲板にコンテナを積み、下部甲板に車輌を積む。
