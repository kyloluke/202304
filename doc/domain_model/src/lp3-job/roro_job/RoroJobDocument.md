### RoroJobDocument / ROROジョブ書類 モデル

ROROジョブに添付する書類を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class RoroJobDocument implements AttachedDocument, FileDocument {
    + enum[] 種別のリスト
    + RoroJob[] 対象のROROジョブリスト
    + File ファイル
    + String 備考
}
```

#### プロパティ

TODO
