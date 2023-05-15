### RoroJobUpdateHistory / ROROジョブ変更履歴 モデル

コンテナジョブの変更履歴を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class "AbstractHistory<RoroJob, User, JsonMemento<RoroJob>>" as AbstractUpdateHistory

class RoroJobUpdateHistory extends AbstractUpdateHistory {
}
```

#### プロパティ

スーパークラスのプロパティを継承する。
