### ContainerJobUpdateHistory / コンテナジョブ変更履歴 モデル

コンテナジョブの変更履歴を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class "AbstractUpdateHistory<ContainerJob, User, JsonMemento<ContainerJob>>" as AbstractUpdateHistory

class ContainerJobUpdateHistory extends AbstractUpdateHistory {
}
```

#### プロパティ

スーパークラスのプロパティを継承する。
