### CargoType / 貨物種別 モデル

貨物の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class CargoType implements DomainModel {
    + {static} CargoType CHASSIS  # 車輌
    + String name  # 名称
}
```

#### プロパティ

CHASSIS / 車輌
: 車輌を表すための定義済みインスタンス。

name / 名称
: 名称。
