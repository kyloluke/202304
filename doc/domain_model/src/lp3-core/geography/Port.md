### Port / 港 モデル

港を表す。貨物を積む側の港と、揚げる側の港の両方を含む。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Port extends AbstractLocation {
    + PortType type                         # 種別
    + Destination[] destinations()      # 仕向地リスト
}
```

#### プロパティ

スーパークラスのプロパティを継承する。それに加えて以下のプロパティを保持する。

type / 種別
: 港の種別。

#### 導出可能プロパティ

destinations / 仕向地リスト
: この港を経由する仕向地のリスト。  
LP2と同様に、データとしては保持しない。過去に蓄積した本船スケジュールから判断することができる。


### PortType / 港種別 列挙型

港の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum PortType {
  + POL  # 積港
  + POD  # 揚港
}
```

#### フィールド

POL / 積港
: 貨物を積み込む港。

POD / 揚港
: 貨物を荷揚げする港。
