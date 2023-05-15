### ContainerJobDocumentHistory / コンテナジョブ書類履歴 モデル

コンテナジョブ書類のダウンロード履歴を表す。  

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class "AbstractHistory<ContainerJobDocument, User>" as AbstractHistory

class ContainerJobDocumentHistory extends AbstractHistory {
    + File file  # ファイル
}
```

#### プロパティ

スーパークラスのプロパティを継承する。それに加えて以下のプロパティを保持する。

file / ファイル
: ダウンロードしたファイル。
