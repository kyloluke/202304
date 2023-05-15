### RoroJobDocumentDownloadHistory / ROROジョブ書類ダウンロード履歴 モデル

ROROジョブ書類のダウンロード履歴を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class "AbstractHistory<RoroJobDocument, User>" as AbstractHistory

class RoroJobDocumentDownloadHistory extends AbstractHistory {
    + File file  # ファイル
}
```

#### プロパティ

スーパークラスのプロパティを継承する。それに加えて以下のプロパティを保持する。

file / ファイル
: ダウンロードしたファイル。
