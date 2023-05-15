### ChassisUpdateHistory / 車輌変更履歴 モデル

車輌の変更履歴を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class "AbstractUpdateHistory<Chassis, User, JsonMemento<Chassis>>" as AbstractUpdateHistory

class ChassisUpdateHistory extends AbstractUpdateHistory {
}
```

#### プロパティ

スーパークラスのプロパティを継承する。
