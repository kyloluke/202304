### Location / ロケーション インターフェース

港などの、輸出に関する地点を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface Location extends DomainModel {
    + {abstract} String name             # 名称
    + {abstract} Address address         # 住所
    + {abstract} String naccsCode        # NACCSコード
    + {abstract} String unloCode         # UN/LOコード
    + {abstract} bool requireLocalAgent  # 現地代理店必須フラグ 
}
```

#### 抽象プロパティ

name / 名称
: 地点の名称。

address / 住所
: 地点の住所。最低限、国とタイムゾーンに有効な値を設定する必要がある。

naccsCode / コード
: 地点に付与されたNACCSコード。

unloCode / UN/LOコード
: 国際連合貿易輸送位置コード。

requireLocalAgent / 現地代理店必須フラグ
: 現地代理店が必須かどうか。

### AbstractLocation / 抽象ロケーション モデル

ロケーションモデルを実装する際の基盤として利用できるユーティリティモデル。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

abstract class AbstractLocation implements Location {
    + String name             # 名称
    + Address address         # 住所
    + String naccsCode        # NACCSコード
    + String unloCode         # UN/LOコード
    + bool requireLocalAgent  # 現地代理店必須フラグ 
}
```

#### プロパティ

スーパーインターフェースのプロパティを実装する。