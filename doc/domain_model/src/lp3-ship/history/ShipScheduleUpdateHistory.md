### ShipScheduleUpdateHistory / 本船スケジュール変更履歴 モデル

本船スケジュールの変更履歴を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class "AbstractUpdateHistory<ShipSchedule, User, JsonMemento<ShipSchedule>>" as AbstractUpdateHistory

class ShipScheduleUpdateHistory extends AbstractUpdateHistory {
}
```

#### プロパティ

スーパークラスのプロパティを継承する。
