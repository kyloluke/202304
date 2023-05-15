### FileDocument / ファイル方式文書 インターフェース

ファイルとして保持する文書を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface FileDocument extends Document {
    + {abstract} File file  # ファイル
}
```

#### 抽象プロパティ

file / ファイル
: 文書のファイル。
