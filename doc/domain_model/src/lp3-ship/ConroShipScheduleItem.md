## ConroShipScheduleItem / ConRO船スケジュール明細 モデル

ConRO船のスケジュール明細を表す。
コンテナ船とRORO船両方のスケジュール明細情報を保持する。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ConroShipScheduleItem extends ContainerShipScheduleItem, RoroShipScheduleItem {
}
```

### プロパティ

スーパークラスのプロパティを継承する。
本船スケジュール明細のプロパティについては菱形継承していることに注意。
