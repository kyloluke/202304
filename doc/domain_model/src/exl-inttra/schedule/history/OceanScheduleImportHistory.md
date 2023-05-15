### OceanScheduleImportHistory / オーシャンスケジュールインポート履歴 モデル

INTTRAから船舶スケジュールを取り込んだ履歴を表す。

```plantuml
hide empty members

class "AbstractHistory<OceanScheduleConfig, User>" as AbstractHistory

class OceanScheduleImportHistory extends AbstractHistory {
    + String processId   # 処理ID
    + int exitCode       # 処理終了コード
    + String summary     # 処理結果サマリ
}
```

#### プロパティ

スーパークラスのプロパティを継承する。

processId / 処理ID
: それぞれの取り込み処理を識別するID

exitCode / 処理終了コード
: 取り込み処理の終了コード。正常終了の場合は0になる

summary / 処理結果サマリ
: 取り込み結果のサマリテキスト
