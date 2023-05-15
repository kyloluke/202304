### ContainerJobDocumentEvent / コンテナジョブ書類イベント モデル

コンテナジョブ書類に関するイベントを表す。

```plantuml
hide empty members

class ContainerJobDocumentEvent implements DomainModel {
    + enum type  # TODO 登録、削除
    + File file  # ファイル
    + User user  # ユーザー
    + TODO 日付など？
}
```

#### プロパティ

TODO
