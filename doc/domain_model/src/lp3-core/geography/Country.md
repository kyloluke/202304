### Country / 国 モデル

地政的な国を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class Country implements DomainModel {
    + String name                           # 名称
    + Region region                         # 地域
    + InspectionType requiredInspections[]  # 必須検査リスト
}
```

#### プロパティ

name / 名称
: 国の名前。「日本」「モンゴル」「アメリカ合衆国」など。

region / 地域
: 国が含まれる地域。国は地理的な位置のみで定義されるものではないため、地域を参照する関係性にしている。

requiredInspections / 必須検査リスト
: 当該の国に輸出を行う際に必要な輸出前検査のリスト。いずれか1つの検査に合格することが求められる。
