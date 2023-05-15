### ContainerJobDocument / コンテナジョブ書類 モデル

コンテナジョブに添付する書類を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ContainerJobDocument extends AttachedDocument, FileDocument {
    + ContainerJob[] containerJobs         # コンテナジョブリスト
    + EnumSet<ContainerJobDocument> types  # 種別セット
    + File file                            # ファイル
    + String remarks                       # 備考
}
```

#### プロパティ

containerJobs / コンテナジョブリスト
: 書類の添付対象のコンテナジョブのリスト。1つの書類を複数のコンテナジョブに添付するケースがあるためリストとする。

types / 種別セット
: 書類の種別のセット。1つの書類で複数の種別を満たすケースがあるためセットとする。

file / ファイル
: 書類のファイル。

remarks / 備考
: 任意の備考文章。

### ContainerJobDocumentType / コンテナジョブ書類種別 列挙型

コンテナジョブに添付する書類の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ContainerJobDocumentType {
    + TODO
}
```
